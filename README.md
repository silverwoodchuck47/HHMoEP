# The HHMoEP Project

## What is the HHMoEP Project?

HHMoEP is PHP code that executes the [Huntington-Hill Method of Equal Proportions](https://en.wikipedia.org/wiki/Huntington%E2%80%93Hill_method)

### The `hunt_hill_method.php` Script

Calculates and displays apportionment using the "Huntington-Hill Method of Equal Proportions" (HHMoEP) for a census.

### The `hunt_hill_method_change.php` Script

Calculates and displays apportionment using the "Huntington-Hill Method of Equal Proportions" (HHMoEP), for two different censuses (with the same states), then compares the number of seats apportioned so you can see which states get more seats and which get fewer.

## How to Use

### Setup

Create a folder in your php folder called *hhmoep*.  Put the files from this project in there.

### Examples

To determine apportionment for the 1990 Census:
```
"../php.exe" -f "../hhmoep/hunt_hill_method.php" "../hhmoep/input1990.txt" > output1990.txt
```

To determine apportionment for the 2000 Census:

```
"../php.exe" -f "../hhmoep/hunt_hill_method.php" "../hhmoep/input2000.txt" > output2000.txt
```

To see the change in apportionment between the 2000 and 2010 censuses:

```
"../php.exe" -f "../hhmoep/hunt_hill_method_change.php" "../hhmoep/input2000.txt" "../hhmoep/input2010.txt" > output2000vs2010.txt
```
