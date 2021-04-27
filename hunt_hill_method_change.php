<?php
/**
 * Calculates and displays apportionment using the "Huntington-Hill Method of Equal Proportions", for
 * two different sets of data, but with the same states, then compares the number of seats apportioned
 * so you can see which states get more seats and which get fewer.
 *
 * Input
 *   1.  Necessary: an input file containing the states and their populations.  (See below)
 *   2.  Necessary: a second input file containing the states and their populations (from a different census).
 *   3.  Necessary: both input files must have identical corresponding state names.
 *   4.  Optional:  the highest potential number of seats for any one state.  (See below)
 *   5.  Optional:  the number of representatives to seat.  (See below)
 *
 * Output
 *   1.  Comparison of the change of the number of seats assigned to each state.
 *
 * Notes
 *   1.  The comments assume 60 maximum potential seats for any one state, 50 states, 435 representatives.
 *   2.  The script outputs a notice if the input is anything other than 50 states.
 *   3.  The output can be directed to a file with the appropriate command.  See Execution Instructions.
 *
 * Environment
 *   This works with PHP v5.3, 7.4.
 *
 * Input File Format
 *   1.  Input file is CSV-formatted where each state and its population is on its own line.
 *   2.  The field values must not contain commas, newlines, or quotes.  See Example input files.
 *   2.  The input file does not contain blank lines, footers, etc.
 *
 * Execution Instructions
 *   One method: In a DOS command window in the php directory, enter the following, then press ENTER:
 *   php -f {path/name of this script} {path/name of input file 1} {path/name of input file 2} [max potential seats = 60] [number of seats = 435]
 *
 *   Example: php -f hhmoep/hunt_hill_method.php hhmoep/input1990.txt hill/input2000.txt > output1990vs2000.txt
 *
 *   Notes about execution:
 *   1. If the [number of seats] parameter is not supplied, then the default 435 is assumed.  The reason
 *      for this parameter is so that this script can be tested with other numbers, such as from homework problems.
 *   2. If the [max potential seats] parameter is not supplied, then the default 60 is assumed.  The reason
 *      for this parameter is so that this script does not need to be modified if 60 is not large enough.
 *   3. The parameters must be supplied in the order specified.
 *   4. For any parameter you provide, you must provide the ones before it.
 *
 *
 * @author    silverwoodchuck47
 * @version   2013-09-13 01:35 PM
 * @link      http://www.census.gov/history/www/reference/apportionment/methods_of_apportionment.html
 * @global    boolean        DEBUG               Control the output while debugging the script.
 * @global    string         DELIMITER           Something to separate the state and the state seat value.
 * @global    integer        MIN_SEAT_NUM        Minimum number of seats to allocate per state (see algorithm).
 * @global    integer        MAX_SEAT_NUM        Maximum number of seats to allocate per state (see algorithm).
 * @global    integer        STATE_COUNT         The number of states in the Union.
 * @global    integer        MAX_NUM_REP         The maximum number of representatives to allocate.
 * @global    integer        MAX_NUM_REP_EXTRA   The number of extra seats to allocate (see algorithm).
 * @global    array          $argv               An array containing the arguments passed to php cli.
 *                           $argv[0]    the file name of this script.
 *                           $argv[1]    the file name of the first (older census) input file.
 *                           $argv[2]    the file name of the second (newer census) input file.
 *                           $argv[3]    the max potential number of seats for a state.  Default is MAX_SEAT_NUM.
 *                           $argv[4]    the max number of seats to assign.  Default is MAX_NUM_REP.
 */

//gets rid of a warning that might occur in PHP5
date_default_timezone_set('America/New_York');

//Constants
define ("DEBUG", false);           //Set to true when debugging this program (creates verbose output).
define ("DELIMITER", "::");        //Needed for "STEP 6"
define ("COMMENT", "#");           //Indicates a comment line.

//Are the following constants overkill?  Not if you want to test this script against
//fictional examples, such as ones found in
// http://www.census.gov/history/www/reference/apportionment/methods_of_apportionment.html

define ("MIN_SEAT_NUM", 2);        //see algorithm
define ("MAX_SEAT_NUM", 60);       //see algorithm
define ("STATE_COUNT", 50);        //There are 50 states in the Union.
define ("MAX_NUM_REP", 435);       //The House of Representatives is limited to 435 seats.
define ("MAX_NUM_REP_EXTRA", 25);  //The number of seats to calculate beyond $max_num_rep


$inputFile1 = $argv[1];
$inputFile2 = $argv[2];

if (!file_exists($inputFile1))
{
    echo "$inputFile1 does not exist.\n";
}
elseif (!file_exists($inputFile2))
{
    echo "$inputFile2 does not exist.\n";
}
else
{
    $aStateRepCount1 = array();
    $aStateRepCount2 = array();

    $aStateRepCount1 = DoApportion($inputFile1);
    $aStateRepCount2 = DoApportion($inputFile2);

    asort($aStateRepCount1);
    asort($aStateRepCount2);

    //create an array that calculates the change in the number of seats assigned to a state.
    foreach ($aStateRepCount2 as $key=>$value)
    {
         $aChange[$key] = $value - $aStateRepCount1[$key];
    }

    ksort($aChange);

    //Display the changes in apportionment counts.
    echo "Change from $inputFile1 and $inputFile2, including 0\n\n";

    foreach ($aChange as $key => $value)
    {
       if ($value > 0) {echo "+"; }
       elseif ( $value == 0 ) { echo " ";}
       echo $value;
       echo " ". $key;
       echo "\n";
    }

    echo "\n\nChange from $inputFile1 and $inputFile2\n\n";

    foreach ($aChange as $key => $value)
    {
       if     ($value > 0) {echo "+" . $value . " " . $key . "\n";}
       elseif ($value < 0) {echo       $value . " " . $key . "\n";}
    }
    echo " 0 remaining states\n";
}

echo "\n";
echo "\nEXECUTION LOG:";
echo "\n* Executed: " . date("r", mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y")));
echo "\n* Script file name: ". $_SERVER["SCRIPT_NAME"];
echo "\n* Input file name 1: ". $argv[1];
echo "\n* Input file name 2: ". $argv[2];


/**
 * Implements the Huntington-Hill Method of Equal Proportions.
 *
 *
 * @param     string         $inputFile       The input file that you want to process.
 * @returns   array(integer) apportionment counts.
 * @var    array(float)   $aMultiplier        Array of multipliers (see algorithm).
 * @var    array(integer) $aStatePop          Array of the states' populations; one element per state.
 * @var    array(integer) $aPriority          Array of the priority values (see algorithm documentation).
 * @var    array          $aStateRepCount     Array of the apportioned number of reps; one element/state.
 * @var    integer        $i                  Generic index loop variable.
 * @var    integer        $s                  State seat number; used in a loop.
 * @var    mixed          $key                An array's key; used in loops.
 * @var    mixed          $value              An array's value for an element with index $key; used in loops.
 * @var    array(mixed)   $aKey               An array containing a state and seat number.
 * @var    integer        $max_seat_num       the highest potential number of seats for a state. ($argv[3])
 * @var    integer        $state_count        The number of states based on the input file.
 * @var    integer        $max_num_rep        The maximum number of representatives to allocate. ($argv[2])
 * @var    array(mixed)   $aData              An array containing the parsed input data field values.
 * @var    integer        $stop               When to stop calculating priority values.
 * @var    integer        $cutoff             When to stop calculating seat assignments.
 */
function DoApportion($inputFile)
{ 
	
    if (!file_exists($inputFile))
    {
        echo "The input file '{$inputFile}' does not exist.\n";
    }
    else
    {
        //ALGORITHM begins
        //See http://www.census.gov/population/www/censusdata/apportionment/computing.html for the algorithm.

        //STEP 1
        //Assign each of the 50 states to one seat
        //  There's nothing to do here to do that is computationally necessary right now...  See STEP 5 below.

        //STEP 2
        //Compute a set of multipliers.
        //use the default if no highest potential maximum seat number is provided
        if (isset($argv[3]))
           {$max_seat_num = $argv[3];}
        else
           {$max_seat_num = MAX_SEAT_NUM;
        }

        $aMultiplier = array();
        for ($i = MIN_SEAT_NUM; $i <= $max_seat_num; $i++)
        {
           $aMultiplier[$i] = 1 / sqrt($i*($i - 1));
        }
        if (DEBUG)
        {
            echo "Multipliers:\n";
            print_r ($aMultiplier);
        }

        //STEP 3
        //Compute a set of Priority values
        //  First we need to know the states and their apportionment population counts.
        //  These counts are in another file, as specified in the parameter.

        $aStatePop = array();
        $aData = array();
        $file_handle = fopen($inputFile, "r");
        while (!feof($file_handle))
        {
           $aData = fgetcsv($file_handle);
           if (!is_null($aData[0]) and false === strpos($aData[0], COMMENT)) {$aStatePop[$aData[0]] = $aData[1];}
        }
        fclose($file_handle);

       if (DEBUG)
       {
           echo "The States and Their Apportionment Populations:\n";
           print_r($aStatePop);
       }

        //Note whether or not we have 50 states.
        $state_count = count($aStatePop);
        if ($state_count != STATE_COUNT)
            {echo "NOTICE: Input file {$inputFile} contains data for $state_count states.\n";}

        //calculate the priority value for each state for every potential seat number.
        $aPriority = array();
        foreach ($aStatePop as $key => $value)
        {
            for ($s = MIN_SEAT_NUM; $s <= $max_seat_num; $s++)
            {
              $aPriority[$key.DELIMITER.$s] = round($value * $aMultiplier[$s]);
            }
        }

        //Let's make sure we have 2950 priority values; no more, no less:
        //50 states * 59 priority values/state = 2950 (every state gets at least one rep)
        if (DEBUG) echo "Number of priority values calculated: ". count($aPriority)."\n";

        //STEP 4
        //Sort the priority values in descending order
        arsort($aPriority);
        // you'll get a list that has items that look like [Montana::36] => 25504
        if (DEBUG)
        {
            echo "List of Every Potential Seat Assignment with Priority Value:\n";
            print_r ($aPriority);
        }
        //STEP 5
        //Display the priority values
        //  We want want to see this in a way such that it "looks pretty", similar to that in
        //  http://www.census.gov/population/www/censusdata/apportionment/files/00pvalues.txt

        // 385 = 435 - 50; there are only 435 reps allowed; first 50 accounted for.
        if (isset($argv[4]))
        {
           $max_num_rep = $argv[4];
        }
        else
        {
           $max_num_rep = MAX_NUM_REP;
        }
        $cutoff = $max_num_rep - $state_count;

        // 410 = 435 + 25 - 50; calculating seats beyond 435 shows how UT lost a rep to NC by ~800 people in 2000.
        $stop = $max_num_rep + MAX_NUM_REP_EXTRA - $state_count;

        $i = 0;

        if (DEBUG) print_r($aPriority);

        foreach ($aPriority as $key => $value)
        {
           $i++;
           if ($i >= $stop) break;
        }
        echo "\n";

        //"STEP 6"
        //Display the number of representatives that each state is allocated.
        //  Step 5's output contains this information, but it's not a list of states and seats allocated.

        //Start each state with one seat.

        $aStateRepCount = array_fill_keys(array_keys($aStatePop), 1);

        if (DEBUG)
        {
            echo "Each State is Guaranteed at Least One Seat:\n";
            print_r ($aStateRepCount);
        }
        
        //Separate the states from their seat assignments.
        $i = 0;
        foreach ($aPriority as $key => $value)
        {
            $i++;
            $aKey = explode(DELIMITER, $key);     //e.g., $aKey[0] = "California"   $aKey[1] = "2"
            $aStateRepCount[$aKey[0]] += 1;
            if ($i == $cutoff) break;
        }

        //ALGORITHM ends

        return $aStateRepCount;
    }
}
?>
