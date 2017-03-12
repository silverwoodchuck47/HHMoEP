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
### Example Output of 2010 Census

    Seat Assignments with Priority Value, Sorted in Descending Order:
    51  California::2  26404774
    52  Texas::2  17867470
    53  California::3  15244803
    54  New York::2  13732760
    55  Florida::2  13364865
    56  California::4  10779704
    57  Texas::3  10315788
    58  Illinois::2  9096490
    59  Pennsylvania::2  9004938
    60  California::5  8349923
    61  Ohio::2  8180161
    62  New York::3  7928613
    63  Florida::3  7716208
    64  Texas::4  7294364
    65  Michigan::2  7008578
    66  Georgia::2  6878428
    67  California::6  6817683
    68  North Carolina::2  6764029
    69  New Jersey::2  6227844
    70  California::7  5761994
    71  Virginia::2  5683538
    72  Texas::5  5650190
    73  New York::4  5606376
    74  Florida::4  5456183
    75  Illinois::3  5251861
    76  Pennsylvania::3  5199003
    77  California::8  4990033
    78  Washington::2  4775353
    79  Ohio::3  4722818
    80  Massachusetts::2  4638369
    81  Texas::6  4613361
    82  Indiana::2  4597313
    83  Arizona::2  4534464
    84  Tennessee::2  4508110
    85  California::9  4400796
    86  New York::5  4342680
    87  Missouri::2  4250757
    88  Florida::5  4226341
    89  Maryland::2  4094098
    90  Michigan::3  4046404
    91  Wisconsin::2  4029257
    92  Georgia::3  3971262
    93  California::10  3936191
    94  North Carolina::3  3905214
    95  Texas::7  3899002
    96  Minnesota::2  3758187
    97  Illinois::4  3713627
    98  Pennsylvania::4  3676250
    99  New Jersey::3  3595647
    100  Colorado::2  3567304
    101  California::11  3560419
    102  New York::6  3545783
    103  Florida::6  3450793
    104  Alabama::2  3396221
    105  Texas::8  3376634
    106  Ohio::4  3339537
    107  South Carolina::2  3285200
    108  Virginia::3  3281392
    109  California::12  3250203
    110  Louisiana::2  3220137
    111  Kentucky::2  3076343
    112  New York::7  2996734
    113  California::13  2989752
    114  Texas::9  2977912
    115  Florida::7  2916453
    116  Illinois::5  2876563
    117  Michigan::4  2861240
    118  Pennsylvania::5  2847611
    119  Georgia::4  2808106
    120  California::14  2767972
    121  North Carolina::4  2761403
    122  Washington::3  2757051
    123  Oregon::2  2721375
    124  Massachusetts::3  2677963
    125  Texas::10  2663525
    126  Oklahoma::2  2662174
    127  Indiana::3  2654260
    128  Arizona::3  2617974
    129  Tennessee::3  2602759
    130  New York::8  2595248
    131  Ohio::5  2586794
    132  California::15  2576842
    133  New Jersey::4  2542507
    134  Connecticut::2  2532593
    135  Florida::8  2525722
    136  Missouri::3  2454176
    137  California::16  2410415
    138  Texas::11  2409249
    139  Maryland::3  2363729
    140  Illinois::6  2348704
    141  Wisconsin::3  2326293
    142  Pennsylvania::6  2325065
    143  Virginia::4  2320295
    144  New York::9  2288793
    145  California::17  2264191
    146  Florida::9  2227477
    147  Michigan::5  2216307
    148  Texas::12  2199333
    149  Georgia::5  2175150
    150  Minnesota::3  2169790
    151  Iowa::2  2159353
    152  North Carolina::5  2138974
    153  California::18  2134699
    154  Ohio::6  2112109
    155  Mississippi::2  2105934
    156  Arkansas::2  2069156
    157  Colorado::3  2059584
    158  New York::10  2047159
    159  Kansas::2  2025022
    160  Texas::13  2023093
    161  California::19  2019224
    162  Florida::10  1992316
    163  Illinois::7  1985017
    164  New Jersey::5  1969417
    165  Pennsylvania::7  1965039
    166  Alabama::3  1960809
    167  Utah::2  1959227
    168  Washington::4  1949530
    169  Nevada::2  1915858
    170  California::20  1915604
    171  South Carolina::3  1896711
    172  Massachusetts::4  1893606
    173  Indiana::4  1876845
    174  Texas::14  1873020
    175  Louisiana::3  1859147
    176  New York::11  1851725
    177  Arizona::4  1851187
    178  Tennessee::4  1840428
    179  California::21  1822102
    180  Michigan::6  1809607
    181  Florida::11  1802118
    182  Virginia::5  1797292
    183  Ohio::7  1785058
    184  Kentucky::3  1776127
    185  Georgia::6  1776002
    186  North Carolina::6  1746465
    187  Texas::15  1743687
    188  California::22  1737307
    189  Missouri::4  1735364
    190  Illinois::8  1719075
    191  Pennsylvania::8  1701773
    192  New York::12  1690386
    193  Maryland::4  1671409
    194  California::23  1660054
    195  Florida::12  1645101
    196  Wisconsin::4  1644937
    197  Texas::16  1631069
    198  New Jersey::6  1608022
    199  California::24  1589381
    200  Oregon::3  1571187
    201  New York::13  1554929
    202  Ohio::8  1545905
    203  Oklahoma::3  1537007
    204  Minnesota::4  1534273
    205  Texas::17  1532123
    206  Michigan::7  1529397
    207  California::25  1524480
    208  Illinois::9  1516082
    209  Florida::13  1513273
    210  Washington::5  1510099
    211  Georgia::7  1500996
    212  Pennsylvania::9  1500823
    213  North Carolina::7  1476032
    214  Virginia::6  1467483
    215  Massachusetts::5  1466781
    216  California::26  1464673
    217  Connecticut::3  1462194
    218  New Mexico::2  1461783
    219  Colorado::4  1456346
    220  Indiana::5  1453798
    221  Texas::18  1444499
    222  New York::14  1439584
    223  Arizona::5  1433923
    224  Tennessee::5  1425590
    225  California::27  1409383
    226  Florida::14  1401019
    227  Alabama::4  1386501
    228  Texas::19  1366360
    229  Ohio::9  1363360
    230  New Jersey::7  1359027
    231  California::28  1358115
    232  Illinois::10  1356025
    233  Missouri::5  1344207
    234  Pennsylvania::10  1342377
    235  South Carolina::4  1341177
    236  New York::15  1340180
    237  Michigan::8  1324497
    238  West Virginia::2  1315088
    239  Louisiana::4  1314616
    240  California::29  1310447
    241  Florida::15  1304277
    242  Georgia::8  1299901
    243  Texas::20  1296242
    244  Nebraska::2  1295296
    245  Maryland::5  1294667
    246  North Carolina::8  1278281
    247  Wisconsin::5  1274163
    248  California::30  1266012
    249  Kentucky::4  1255912
    250  New York::16  1253624
    251  Iowa::3  1246703
    252  Virginia::7  1240250
    253  Washington::6  1232991
    254  Texas::21  1232973
    255  Illinois::11  1226571
    256  California::31  1224492
    257  Florida::16  1220040
    258  Ohio::10  1219426
    259  Mississippi::3  1215861
    260  Pennsylvania::11  1214226
    261  Massachusetts::6  1197622
    262  Arkansas::3  1194628
    263  Minnesota::5  1188443
    264  Indiana::6  1187021
    265  California::32  1185609
    266  New York::17  1177574
    267  New Jersey::8  1176952
    268  Texas::22  1175593
    269  Arizona::6  1170793
    270  Kansas::3  1169147
    271  Michigan::9  1168096
    272  Tennessee::6  1163989
    273  California::33  1149120
    274  Georgia::9  1146405
    275  Florida::17  1146028
    276  Utah::3  1131160
    277  Colorado::5  1128081
    278  North Carolina::9  1127338
    279  Texas::23  1123318
    280  Illinois::12  1119701
    281  California::34  1114810
    282  Idaho::2  1112632
    283  Oregon::4  1110997
    284  New York::18  1110228
    285  Pennsylvania::12  1108431
    286  Nevada::3  1106121
    287  Ohio::11  1103013
    288  Missouri::6  1097541
    289  Oklahoma::4  1086828
    290  California::35  1082490
    291  Florida::18  1080485
    292  Texas::24  1075495
    293  Virginia::8  1074088
    294  Alabama::5  1073979
    295  Maryland::6  1057092
    296  California::36  1051991
    297  New York::19  1050170
    298  Michigan::10  1044777
    299  Washington::7  1042067
    300  Wisconsin::6  1040350
    301  South Carolina::5  1038872
    302  New Jersey::9  1037974
    303  Connecticut::4  1033927
    304  Texas::25  1031579
    305  Illinois::13  1029975
    306  Georgia::10  1025375
    307  California::37  1023164
    308  Florida::19  1022037
    309  Pennsylvania::13  1019608
    310  Louisiana::5  1018297
    311  Massachusetts::7  1012175
    312  North Carolina::10  1008322
    313  Ohio::12  1006908
    314  Indiana::7  1003216
    315  New York::20  996279
    316  California::38  995875
    317  Texas::26  991109
    318  Arizona::7  989501
    319  Tennessee::7  983750
    320  Kentucky::5  972825
    321  Minnesota::6  970360
    322  California::39  970004
    323  Florida::20  969589
    324  Hawaii::2  966517
    325  Texas::27  953695
    326  Illinois::14  953571
    327  New York::21  947650
    328  Virginia::9  947256
    329  California::40  945443
    330  Michigan::11  945036
    331  Pennsylvania::14  943974
    332  Maine::2  942626
    333  New Hampshire::2  934403
    334  New Jersey::10  928392
    335  Missouri::7  927591
    336  Georgia::11  927487
    337  Ohio::13  926221
    338  Florida::21  922263
    339  California::41  922095
    340  Colorado::6  921074
    341  Texas::28  919003
    342  North Carolina::11  912061
    343  New York::22  903549
    344  Washington::8  902457
    345  California::42  899872
    346  Maryland::7  893405
    347  Illinois::15  887727
    348  Texas::29  886748
    349  Iowa::4  881552
    350  Florida::22  879344
    351  Wisconsin::7  879256
    352  Pennsylvania::15  878792
    353  California::43  878696
    354  Alabama::6  876901
    355  Massachusetts::8  876569
    356  Indiana::8  868810
    357  New York::23  863371
    358  Michigan::12  862696
    359  Oregon::5  860574
    360  Mississippi::4  859744
    361  California::44  858493
    362  Ohio::14  857514
    363  Arizona::8  856933
    364  Texas::30  856680
    365  Tennessee::8  851953
    366  South Carolina::6  848235
    367  Virginia::10  847252
    368  Georgia::12  846676
    369  Arkansas::4  844730
    370  New Mexico::3  843961
    371  Oklahoma::5  841853
    372  Florida::23  840242
    373  New Jersey::11  839762
    374  California::45  839199
    375  North Carolina::12  832594
    376  Louisiana::6  831436
    377  Illinois::16  830392
    378  Texas::31  828584
    379  Kansas::4  826712
    380  New York::24  826615
    381  Pennsylvania::16  822035
    382  California::46  820753
    383  Minnesota::7  820104
    384  Florida::24  804470
    385  Missouri::8  803318
    386  California::47  803100
    387  Texas::32  802273
    388  Connecticut::5  800876
    389  Utah::4  799851
    390  Ohio::15  798302
    391  Washington::9  795892
    392  Kentucky::6  794308
    393  Michigan::13  793565
    394  New York::25  792861
    395  California::48  786191
    396  Nevada::4  782146
    397  Illinois::17  780018
    398  Georgia::13  778829
    399  Colorado::7  778450
    400  Texas::33  777582
    401  Maryland::8  773712
    402  Massachusetts::9  773061
    403  Pennsylvania::17  772167
    404  Florida::25  771621
    405  California::49  769979
    406  New Jersey::12  766595
    407  Virginia::11  766368
    408  Indiana::9  766219
    409  North Carolina::13  765875
    410  New York::26  761756
    411  Wisconsin::8  761458
    412  West Virginia::3  759266
    413  Arizona::9  755744
    414  California::50  754422
    415  Texas::34  754365
    416  Tennessee::9  751352
    417  Nebraska::3  747839
    418  Ohio::16  746743
    419  Rhode Island::2  746172
    420  Florida::26  741349
    421  Alabama::7  741116
    422  California::51  739482
    423  Illinois::18  735408
    424  Michigan::14  734699
    425  New York::27  733000
    426  Texas::35  732495
    427  Pennsylvania::18  728006
    428  California::52  725121
    429  Georgia::14  721055
    430  South Carolina::7  716890
    431  Florida::27  713364
    432  Washington::10  711868
    433  Texas::36  711857
    434  California::53  711308
    435  Minnesota::8  710231
    --- cut off ---
    436  North Carolina::14  709063
    437  Missouri::9  708459
    438  New York::28  706337
    439  New Jersey::13  705164
    440  Montana::2  703158
    441  Louisiana::7  702692
    442  Oregon::6  702656
    443  Ohio::17  701443
    444  Virginia::12  699595
    445  California::54  698012
    446  Illinois::19  695626
    447  Texas::37  692350
    448  Massachusetts::10  691447
    449  Pennsylvania::19  688625
    450  Florida::28  687414
    451  Oklahoma::6  687370
    452  Indiana::10  685327
    453  California::55  685203
    454  Michigan::15  683967
    455  Iowa::5  682848
    456  Maryland::9  682350
    457  New York::29  681545
    458  Arizona::10  675958
    459  Colorado::8  674157
    460  Texas::38  673884

    Apportionment Allocation by State:
    Array
    (
        [Alabama] => 7
        [Alaska] => 1
        [Arizona] => 9
        [Arkansas] => 4
        [California] => 53
        [Colorado] => 7
        [Connecticut] => 5
        [Delaware] => 1
        [Florida] => 27
        [Georgia] => 14
        [Hawaii] => 2
        [Idaho] => 2
        [Illinois] => 18
        [Indiana] => 9
        [Iowa] => 4
        [Kansas] => 4
        [Kentucky] => 6
        [Louisiana] => 6
        [Maine] => 2
        [Maryland] => 8
        [Massachusetts] => 9
        [Michigan] => 14
        [Minnesota] => 8
        [Mississippi] => 4
        [Missouri] => 8
        [Montana] => 1
        [Nebraska] => 3
        [Nevada] => 4
        [New Hampshire] => 2
        [New Jersey] => 12
        [New Mexico] => 3
        [New York] => 27
        [North Carolina] => 13
        [North Dakota] => 1
        [Ohio] => 16
        [Oklahoma] => 5
        [Oregon] => 5
        [Pennsylvania] => 18
        [Rhode Island] => 2
        [South Carolina] => 7
        [South Dakota] => 1
        [Tennessee] => 9
        [Texas] => 36
        [Utah] => 4
        [Vermont] => 1
        [Virginia] => 11
        [Washington] => 10
        [West Virginia] => 3
        [Wisconsin] => 8
        [Wyoming] => 1
    )

    EXECUTION LOG:
    * Executed: Sun, 12 Mar 2017 09:28:29 -0400
    * Script file name: ../hhmoep/hunt_hill_method.php
    * Input file name: ../hhmoep/input2010.txt
    * Number of representatives apportioned: 435
    * Number of states: 50
    * Highest number of seats assigned to one or more states: 53
    * Potential maximum number of seats to assign


### Example Output (Compare change from 2000 to 2010 Census)

    Change from ../hhmoep/input2000.txt and ../hhmoep/input2010.txt, including 0

     0 Alabama
     0 Alaska
    +1 Arizona
     0 Arkansas
     0 California
     0 Colorado
     0 Connecticut
     0 Delaware
    +2 Florida
    +1 Georgia
     0 Hawaii
     0 Idaho
    -1 Illinois
     0 Indiana
    -1 Iowa
     0 Kansas
     0 Kentucky
    -1 Louisiana
     0 Maine
     0 Maryland
    -1 Massachusetts
    -1 Michigan
     0 Minnesota
     0 Mississippi
    -1 Missouri
     0 Montana
     0 Nebraska
    +1 Nevada
     0 New Hampshire
    -1 New Jersey
     0 New Mexico
    -2 New York
     0 North Carolina
     0 North Dakota
    -2 Ohio
     0 Oklahoma
     0 Oregon
    -1 Pennsylvania
     0 Rhode Island
    +1 South Carolina
     0 South Dakota
     0 Tennessee
    +4 Texas
    +1 Utah
     0 Vermont
     0 Virginia
    +1 Washington
     0 West Virginia
     0 Wisconsin
     0 Wyoming


    Change from ../hhmoep/input2000.txt and ../hhmoep/input2010.txt

    +1 Arizona
    +2 Florida
    +1 Georgia
    -1 Illinois
    -1 Iowa
    -1 Louisiana
    -1 Massachusetts
    -1 Michigan
    -1 Missouri
    +1 Nevada
    -1 New Jersey
    -2 New York
    -2 Ohio
    -1 Pennsylvania
    +1 South Carolina
    +4 Texas
    +1 Utah
    +1 Washington
     0 remaining states


    EXECUTION LOG:
    * Executed: Sun, 12 Mar 2017 09:16:28 -0400
    * Script file name: ../hhmoep/hunt_hill_method_change.php
    * Input file name 1: ../hhmoep/input2000.txt
    * Input file name 2: ../hhmoep/input2010.txt