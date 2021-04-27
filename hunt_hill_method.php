<?php
/**
 * Calculates and displays apportionment using the "Huntington-Hill Method of Equal Proportions".
 *
 *
 * Input
 *   1.  Necessary: an input file containing the states and their populations.  (See below)
 *   2.  Optional:  the number of representatives to seat.  (See below)
 *   3.  Optional:  the highest potential number of seats for any one state.  (See below)
 *
 * Output
 *   1.  Priority values in descending order.
 *   2.  States and their apportionment allocation (number of seats entitled to).
 *   3.  Notice if supplied parameters differ from the defaults. (See below)
 *   4.  Warnings, if appropriate. (see below)
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
 *   1.  CSV-formatted where each state and its population is on its own line, separated by a comma, with the exception of
 *   2.  Comments are full-line.  If the token that indicates a comment is in the line, the whole line is a comment.
 *   3.  The field values must not contain commas, or quotes.  See Example input files.
 *
 * Execution Instructions
 *   One method: In a DOS command window in the php directory, enter the following, then press ENTER:
 *   php -f {path/name of this script} {path/name of input file} [number of seats = 435] [max potential seats = 60]
 *
 *   Example: php -f hhmoep/hunt_hill_method.php hhmoep/input1900.txt
 *   Example: php -f hhmoep/hunt_hill_method.php hhmoep/inputTest.txt 20
 *   Example: php -f hhmoep/hunt_hill_method.php hhmoep/inputTest.txt 20 10
 *   Example: php -f hhmoep/hunt_hill_method.php hhmoep/input2000.txt > output2000.txt
 *   Example: php -f hhmoep/hunt_hill_method.php hhmoep/input2010Projection.txt > output2010Projection.txt
 *
 *   Notes about execution:
 *   1. If the [number of seats] parameter is not supplied, then the default 435 is assumed.  The reason
 *      for this parameter is so that this script can be tested with other numbers, such as from homework problems.
 *   2. If the [max potential seats] parameter is not supplied, then the default 60 is assumed.  The reason
 *      for this parameter is so that this script does not need to be modified if 60 is not large enough.
 *   3. The parameters must be supplied in the order specified.
 *   4. For any parameter you provide, you must provide the ones before it.
 *
 * Improvements
 * @todo 1. Make the output in Step 6 "pretty."
 *
 * @author    silverwoodchuck47
 * @version   2013-09-13 01:35 PM
 * @link      http://www.census.gov/history/www/reference/apportionment/methods_of_apportionment.html
 * @example   input1990.txt  input file to calculate 1990 apportionment.
 * @example   input2000.txt  input file to calculate 2000 apportionment.
 * @example   input2010Projection.txt  input file to calculate 2010 apportionment based on 2010 projections.
 * @example   inputTest.txt  input file to calculate apportionment for fictional country of four states.
 * @global    boolean        DEBUG               Control the output while debugging the script.
 * @global    string         DELIMITER           Something to separate the state and the state seat value.
 * @global    integer        MIN_SEAT_NUM        Minimum number of seats to allocate per state (see algorithm).
 * @global    integer        MAX_SEAT_NUM        Maximum number of seats to allocate per state (see algorithm).
 * @global    integer        $max_seat_num       the highest potential number of seats for a state. ($argv[3])
 * @global    integer        STATE_COUNT         The number of states in the Union.
 * @global    integer        $state_count        The number of states based on the input file.
 * @global    integer        MAX_NUM_REP         The maximum number of representatives to allocate.
 * @global    integer        $max_num_rep        The maximum number of representatives to allocate. ($argv[2])
 * @global    integer        MAX_NUM_REP_EXTRA   The number of extra seats to allocate (see algorithm).
 * @global    array(float)   $aMultiplier        Array of multipliers (see algorithm).
 * @global    array(integer) $aStatePop          Array of the states' populations; one element per state.
 * @global    array(integer) $aPriority          Array of the priority values (see algorithm documentation).
 * @glabel    array          $aStateRepCount     Array of the apportioned number of reps; one element/state.
 * @global    integer        $i                  Generic index loop variable.
 * @global    integer        $s                  State seat number; used in a loop.
 * @global    mixed          $key                An array's key; used in loops.
 * @global    mixed          $value              An array's value for an element with index $key; used in loops.
 * @global    array(mixed)   $aKey               An array containing a state and seat number.
 * @global    array          $argv               An array containing the arguments passed to php cli.
 *                           $argv[0]    contains the file name of this script.
 *                           $argv[1]    contains the file name of the input file.
 *                           $argv[2]    the number of seats that you want to assign.  Default is MAX_NUM_REP.
 *                           $argv[3]    the max potential number of seats for a state.  Default is MAX_SEAT_NUM.
 * @global    array(mixed)   $aData              An array containing the parsed input data field values.
 * @global    integer        $stop               When to stop calculating priority values.
 * @global    integer        $cutoff             When to stop calculating seat assignments.
 */

//gets rid of a warning that might occur in PHP5
date_default_timezone_set('America/New_York');

//Constants
define ("DEBUG", false);           //Set to true when debugging this program (creates verbose output).
define ("DELIMITER", "::");        //Needed for "STEP 6"
define ("COMMENT", "#");           //Indicates a comment line.

//Are the following constants overkill?  Not if you want to test this script against
//fictional examples, such as ones found in
// http://www.census.gov/history/www/census_then_now/apportionment/methods_of_apportionment.html

define ("MIN_SEAT_NUM", 2);        //see algorithm
define ("MAX_SEAT_NUM", 60);       //see algorithm
define ("STATE_COUNT", 50);        //There are 50 states in the Union.
define ("MAX_NUM_REP", 435);       //The House of Representatives is limited to 435 seats.
define ("MAX_NUM_REP_EXTRA", 25);  //The number of seats to calculate beyond $max_num_rep

if (!file_exists($argv[1]))
{
    echo "The input file '{$argv[1]}' does not exist.\n";
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
    $file_handle = fopen($argv[1], "r");
    while (!feof($file_handle))
    {
       $aData = fgetcsv($file_handle);
       if (DEBUG)
       {
            echo "Raw Input from File\n";
            print_r ($aData);
       }
       //$aData = explode (",", fgets($file_handle));  //expect a comma to separate the data

       //this gets rid of blank lines and comments in the input file
       //the first conjunct looks for blank lines, the second conjunct looks for a comment line
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
        {echo "NOTICE: Input file {$argv[1]} contains data for $state_count states.\n";}

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
    if (isset($argv[2]))
    {
       $max_num_rep = $argv[2];
    }
    else
    {
       $max_num_rep = MAX_NUM_REP;
    }
    $cutoff = $max_num_rep - $state_count;

    // 410 = 435 + 25 - 50; calculating seats beyond 435 shows how UT lost a rep to NC by ~800 people in 2000.
    $stop = $max_num_rep + MAX_NUM_REP_EXTRA - $state_count;

    //Display the Priority values.
    //for example: where $i=1, (50+$i) displays "51",
    //                            $key displays "California::2",
    //                          $value displays "23992697"
    echo "Seat Assignments with Priority Value, Sorted in Descending Order:\n";
    $i = 0;
    
    if (DEBUG) print_r($aPriority);
    
    foreach ($aPriority as $key => $value)
    {
       $i++;
       //display $state_count+$i because each state is entitled to at least one rep.
       echo ($state_count+$i)."  ".$key."  ".$value."\n";
       if ($i == $cutoff) echo "--- cut off ---\n";
       if ($i >= $stop) break;
    }
    echo "\n";

    //"STEP 6"
    //Display the number of representatives that each state is allocated.
    //  Step 5's output contains this information, but it's not a list of states and seats allocated.

    //Start each state with one seat.
    $aStateRepCount = array();
    $aStateRepCount = array_fill_keys(array_keys($aStatePop), 1);

    if (DEBUG)
    {
        echo "Each State is Guaranteed at Least One Seat:\n";
        print_r ($aStateRepCount);
    }
    //Separate the states from their seat assignments.
    $i = 0;
    echo "Apportionment Allocation by State:\n";
    foreach ($aPriority as $key => $value)
    {
        $i++;
        $aKey = explode(DELIMITER, $key);     //e.g., $aKey[0] = "California"   $aKey[1] = "2"
        $aStateRepCount[$aKey[0]] += 1;
        if ($i == $cutoff) break;
    }

    //Display an array of state names and the apportioned representatives entitled to each state.
    //example: [Alabama] => 7
    //         [Alaska] => 1
    //     (snip)
    //         [Wisconsin] => 8
    //         [Wyoming] => 1

    //This is what taxpayers want to know after they spend $14 billion over the 10-year life-cycle of Census 2010.
    print_r ($aStateRepCount);

    //Summary results that establishes the provenance of the output
    echo "\nEXECUTION LOG:";
    echo "\n* Executed: " . date("r", mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y")));
    echo "\n* Script file name: ". $_SERVER["SCRIPT_NAME"];
    echo "\n* Input file name: ". $argv[1];
    echo "\n* Number of representatives apportioned: " . array_sum($aStateRepCount);
    echo "\n* Number of states: ".$state_count;
    echo "\n* Highest number of seats assigned to one or more states: " . max($aStateRepCount);
    echo "\n* Potential maximum number of seats to assign: " . $max_seat_num;

    if (max($aStateRepCount) >= $max_seat_num)
    {
         echo "\n\nWARNING:  The maximum potential number of seats $max_seat_num is less than the"
               ." actual number assigned to at least one state (". max($aStateRepCount).").\n";
    }

    //ALGORITHM ends

    //housekeeping; free memory.
    unset($aData, $aKey, $aMultiplier, $aPriority, $aStatePop, $aStateRepCount);
}
?>
