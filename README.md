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

To determine apportionment for the 2010 Census:
```
"../php.exe" -f "../hhmoep/hunt_hill_method.php" "../hhmoep/input2010.txt" > output2010.txt
```

To determine apportionment for the 2020 Census:

```
"../php.exe" -f "../hhmoep/hunt_hill_method.php" "../hhmoep/input2020.txt" > output2020.txt
```

To see the change in apportionment between the 2010 and 2020 censuses:

```
"../php.exe" -f "../hhmoep/hunt_hill_method_change.php" "../hhmoep/input2010.txt" "../hhmoep/input2020.txt" > output2010vs2020.txt
```
### Example Output of 2020 Census

Seat Assignments with Priority Value, Sorted in Descending Order:
51  California::2  27984993
52  Texas::2  20635702
53  California::3  16157143
54  Florida::2  15252666
55  New York::2  14294695
56  Texas::3  11914028
57  California::4  11424826
58  Pennsylvania::2  9200763
59  Illinois::2  9067046
60  California::5  8849632
61  Florida::3  8806131
62  Texas::4  8424490
63  Ohio::2  8350116
64  New York::3  8253046
65  Georgia::2  7583914
66  North Carolina::2  7392058
67  California::6  7225694
68  Michigan::2  7130777
69  New Jersey::2  6572199
70  Texas::5  6525582
71  Florida::4  6226875
72  Virginia::2  6119685
73  California::7  6106826
74  New York::4  5835785
75  Washington::2  5455998
76  Texas::6  5328115
77  Pennsylvania::3  5312063
78  California::8  5288667
79  Illinois::3  5234861
80  Arizona::2  5062123
81  Massachusetts::2  4973414
82  Tennessee::2  4890985
83  Florida::5  4823316
84  Ohio::3  4820942
85  Indiana::2  4801453
86  California::9  4664166
87  New York::5  4520379
88  Texas::7  4503079
89  Georgia::3  4378575
90  Maryland::2  4373652
91  Missouri::2  4355976
92  North Carolina::3  4267806
93  California::10  4171756
94  Wisconsin::2  4170143
95  Michigan::3  4116956
96  Colorado::2  4088612
97  Minnesota::2  4037404
98  Florida::6  3938221
99  Texas::8  3899781
100  New Jersey::3  3794461
101  California::11  3773496
102  Pennsylvania::4  3756196
103  Illinois::4  3701606
104  New York::6  3690874
105  South Carolina::2  3623719
106  Alabama::2  3556785
107  Virginia::3  3533202
108  California::12  3444715
109  Texas::9  3439284
110  Ohio::4  3408921
111  Florida::7  3328405
112  Louisiana::2  3296156
113  Kentucky::2  3188586
114  California::13  3168677
115  Washington::3  3150022
116  New York::7  3119358
117  Georgia::4  3096120
118  Texas::10  3076189
119  North Carolina::4  3017795
120  Oregon::2  2999193
121  California::14  2933624
122  Arizona::3  2922618
123  Michigan::4  2911128
124  Pennsylvania::5  2909537
125  Florida::8  2882483
126  Massachusetts::3  2871402
127  Illinois::5  2867252
128  Tennessee::3  2823811
129  Oklahoma::2  2802629
130  Texas::11  2782518
131  Indiana::3  2772120
132  California::15  2731056
133  New York::8  2701443
134  New Jersey::4  2683089
135  Ohio::5  2640539
136  California::16  2554669
137  Connecticut::2  2551452
138  Florida::9  2542111
139  Texas::12  2540079
140  Maryland::3  2525129
141  Missouri::3  2514924
142  Virginia::4  2498351
143  Wisconsin::3  2407633
144  California::17  2399693
145  Georgia::5  2398244
146  New York::9  2382449
147  Pennsylvania::6  2375627
148  Colorado::3  2360561
149  Illinois::6  2341101
150  North Carolina::5  2337574
151  Texas::13  2336533
152  Minnesota::3  2330996
153  Utah::2  2315953
154  Florida::10  2273733
155  California::18  2262453
156  Iowa::2  2257372
157  Michigan::5  2254950
158  Washington::4  2227402
159  Nevada::2  2198015
160  Texas::14  2163209
161  Ohio::6  2155991
162  California::19  2140066
163  Arkansas::2  2131047
164  New York::10  2130927
165  Mississippi::2  2095804
166  South Carolina::3  2092155
167  Kansas::2  2079506
168  New Jersey::5  2078312
169  Arizona::4  2066603
170  Florida::11  2056669
171  Alabama::3  2053511
172  Massachusetts::4  2030388
173  California::20  2030245
174  Texas::15  2013838
175  Pennsylvania::7  2007771
176  Tennessee::4  1996736
177  Illinois::7  1978592
178  Indiana::4  1960185
179  Georgia::6  1958158
180  Virginia::5  1935214
181  California::21  1931148
182  New York::11  1927496
183  North Carolina::6  1908621
184  Louisiana::3  1903036
185  Texas::16  1883773
186  Florida::12  1877473
187  California::22  1841277
188  Michigan::6  1841159
189  Kentucky::3  1840931
190  Ohio::7  1822145
191  Maryland::4  1785536
192  Missouri::4  1778320
193  Texas::17  1769497
194  New York::12  1759555
195  California::23  1759401
196  Pennsylvania::8  1738781
197  Oregon::3  1731585
198  Florida::13  1727024
199  Washington::5  1725338
200  Illinois::8  1713511
201  Wisconsin::4  1702454
202  New Jersey::6  1696934
203  California::24  1684499
204  Colorado::4  1669169
205  Texas::18  1668298
206  Georgia::7  1654946
207  Minnesota::4  1648263
208  New York::13  1618555
209  Oklahoma::3  1618099
210  California::25  1615714
211  North Carolina::7  1613079
212  Arizona::5  1600784
213  Florida::14  1598914
214  Virginia::6  1580096
215  Texas::19  1578052
216  Ohio::8  1578024
217  Massachusetts::5  1572731
218  Michigan::7  1556063
219  California::26  1552328
220  Tennessee::5  1546665
221  Pennsylvania::9  1533461
222  Indiana::5  1518353
223  Illinois::9  1511174
224  New Mexico::2  1499222
225  New York::14  1498491
226  Texas::20  1497071
227  California::27  1493728
228  Florida::15  1488508
229  South Carolina::4  1479377
230  Connecticut::3  1473081
231  Alabama::4  1452051
232  California::28  1439393
233  New Jersey::7  1434171
234  Georgia::8  1433225
235  Texas::21  1423999
236  Washington::6  1408733
237  North Carolina::8  1396968
238  New York::15  1395019
239  Florida::16  1392372
240  Ohio::9  1391686
241  California::29  1388872
242  Nebraska::2  1388286
243  Maryland::5  1383070
244  Missouri::5  1377481
245  Pennsylvania::10  1371569
246  Texas::22  1357730
247  Illinois::10  1351635
248  Michigan::8  1347590
249  Louisiana::4  1345650
250  California::30  1341778
251  Utah::3  1337116
252  Virginia::7  1335425
253  Wisconsin::5  1318715
254  Florida::17  1307905
255  Arizona::6  1307035
256  New York::16  1304921
257  Iowa::3  1303294
258  Idaho::2  1302050
259  Kentucky::4  1301735
260  California::31  1297773
261  Texas::23  1297355
262  Colorado::5  1292933
263  Massachusetts::6  1284130
264  Minnesota::5  1276739
265  West Virginia::2  1269288
266  Nevada::3  1269024
267  Georgia::9  1263986
268  Tennessee::6  1262847
269  California::32  1256563
270  Ohio::10  1244762
271  Texas::24  1242123
272  New Jersey::8  1242029
273  Pennsylvania::11  1240631
274  Indiana::6  1239730
275  Florida::18  1233105
276  North Carolina::9  1232010
277  Arkansas::3  1230361
278  New York::17  1225760
279  Oregon::4  1224416
280  Illinois::11  1222600
281  California::33  1217891
282  Mississippi::3  1210013
283  Kansas::3  1200603
284  Texas::25  1191403
285  Washington::7  1190596
286  Michigan::9  1188463
287  California::34  1181527
288  Florida::19  1166401
289  Virginia::8  1156512
290  New York::18  1155658
291  California::35  1147273
292  South Carolina::5  1145920
293  Texas::26  1144663
294  Oklahoma::4  1144169
295  Pennsylvania::12  1132536
296  Georgia::10  1130543
297  Maryland::6  1129272
298  Ohio::11  1125929
299  Alabama::5  1124754
300  Missouri::6  1124708
301  Illinois::12  1116076
302  California::36  1114949
303  Florida::20  1106545
304  Arizona::7  1104646
305  North Carolina::10  1101943
306  Texas::27  1101452
307  New Jersey::9  1095367
308  New York::19  1093143
309  Massachusetts::7  1085288
310  California::37  1084396
311  Wisconsin::6  1076726
312  Tennessee::7  1067300
313  Michigan::10  1062994
314  Texas::28  1061386
315  Colorado::6  1055675
316  California::38  1055474
317  Florida::21  1052534
318  Indiana::7  1047763
319  Minnesota::6  1042453
320  Louisiana::5  1042336
321  Pennsylvania::13  1041781
322  Connecticut::4  1041626
323  New York::20  1037046
324  Hawaii::2  1032473
325  Washington::8  1031087
326  California::39  1028054
327  Ohio::12  1027828
328  Illinois::13  1026641
329  Texas::29  1024133
330  Georgia::11  1022615
331  Virginia::9  1019948
332  Kentucky::5  1008320
333  Florida::22  1003552
334  California::40  1002023
335  North Carolina::11  996745
336  Texas::30  989406
337  New York::21  986428
338  New Jersey::10  979726
339  California::41  977278
340  New Hampshire::2  975163
341  Pennsylvania::14  964502
342  Maine::2  964198
343  Michigan::11  961514
344  Florida::23  958927
345  Texas::31  956958
346  Arizona::8  956651
347  Maryland::7  954409
348  California::42  953726
349  Missouri::7  950552
350  Illinois::14  950485
351  Oregon::5  948428
352  Utah::4  945484
353  Ohio::13  945465
354  New York::22  940522
355  Massachusetts::8  939887
356  South Carolina::6  935640
357  Georgia::12  933515
358  California::43  931282
359  Texas::32  926570
360  Tennessee::8  924309
361  Iowa::4  921568
362  Alabama::6  918358
363  Florida::24  918103
364  Virginia::10  912269
365  Wisconsin::7  910000
366  North Carolina::12  909899
367  California::44  909871
368  Washington::9  909333
369  Indiana::8  907389
370  New York::23  898700
371  Texas::33  898054
372  Pennsylvania::15  897903
373  Nevada::4  897336
374  Colorado::7  892208
375  California::45  889421
376  Oklahoma::5  886269
377  New Jersey::11  886195
378  Illinois::15  884853
379  Minnesota::7  881034
380  Florida::25  880613
381  Michigan::12  877738
382  Ohio::14  875330
383  Texas::34  871240
384  Arkansas::4  869996
385  California::46  869871
386  New Mexico::3  865576
387  New York::24  860440
388  Georgia::13  858709
389  Mississippi::4  855608
390  California::47  851162
391  Louisiana::6  851064
392  Kansas::4  848955
393  Florida::26  846066
394  Texas::35  845981
395  Arizona::9  843687
396  Pennsylvania::16  839911
397  North Carolina::13  836986
398  California::48  833241
399  Massachusetts::9  828902
400  Illinois::16  827704
401  Maryland::8  826543
402  New York::25  825305
403  Virginia::11  825178
404  Kentucky::6  823289
405  Missouri::8  823202
406  Texas::36  822146
407  California::49  816059
408  Tennessee::9  815164
409  Ohio::15  814888
410  Florida::27  814127
411  Washington::10  813332
412  New Jersey::12  808982
413  Michigan::13  807402
414  Connecticut::5  806840
415  Nebraska::3  801527
416  Indiana::9  800242
417  Texas::37  799617
418  California::50  799571
419  Georgia::14  795010
420  New York::26  792927
421  South Carolina::7  790760
422  Pennsylvania::17  788959
423  Wisconsin::8  788083
424  Florida::28  784512
425  California::51  783737
426  Texas::38  778290
427  Illinois::17  777493
428  Rhode Island::2  776519
429  Alabama::7  776154
430  North Carolina::14  774898
431  Oregon::6  774388
432  Colorado::8  772675
433  California::52  768517
434  Montana::2  767499
435  Minnesota::8  762998
--- cut off ---
436  New York::27  762994
437  Ohio::16  762258
438  Texas::39  758071
439  Florida::29  756977
440  Arizona::10  754617
441  California::53  753877
442  Virginia::12  753281
443  Idaho::3  751739
444  Michigan::14  747509
445  New Jersey::13  744155
446  Pennsylvania::18  743838
447  Massachusetts::10  741393
448  Georgia::15  740114
449  California::54  739785
450  Texas::40  738877
451  Washington::11  735687
452  New York::28  735240
453  Illinois::18  733027
454  West Virginia::3  732824
455  Utah::5  732369
456  Florida::30  731309
457  Tennessee::10  729105
458  Maryland::9  728942
459  California::55  726210
460  Missouri::9  725996

Apportionment Allocation by State:
Array
(
    [Alabama] => 7
    [Alaska] => 1
    [Arizona] => 9
    [Arkansas] => 4
    [California] => 52
    [Colorado] => 8
    [Connecticut] => 5
    [Delaware] => 1
    [Florida] => 28
    [Georgia] => 14
    [Hawaii] => 2
    [Idaho] => 2
    [Illinois] => 17
    [Indiana] => 9
    [Iowa] => 4
    [Kansas] => 4
    [Kentucky] => 6
    [Louisiana] => 6
    [Maine] => 2
    [Maryland] => 8
    [Massachusetts] => 9
    [Michigan] => 13
    [Minnesota] => 8
    [Mississippi] => 4
    [Missouri] => 8
    [Montana] => 2
    [Nebraska] => 3
    [Nevada] => 4
    [New Hampshire] => 2
    [New Jersey] => 12
    [New Mexico] => 3
    [New York] => 26
    [North Carolina] => 14
    [North Dakota] => 1
    [Ohio] => 15
    [Oklahoma] => 5
    [Oregon] => 6
    [Pennsylvania] => 17
    [Rhode Island] => 2
    [South Carolina] => 7
    [South Dakota] => 1
    [Tennessee] => 9
    [Texas] => 38
    [Utah] => 4
    [Vermont] => 1
    [Virginia] => 11
    [Washington] => 10
    [West Virginia] => 2
    [Wisconsin] => 8
    [Wyoming] => 1
)

EXECUTION LOG:
* Executed: Mon, 26 Apr 2021 16:11:49 -0400
* Script file name: ../hhmoep/hunt_hill_method.php
* Input file name: ../hhmoep/input2020.txt
* Number of representatives apportioned: 435
* Number of states: 50
* Highest number of seats assigned to one or more states: 52
* Potential maximum number of seats to assign: 60


### Example Output (Compare change from 2010 to 2020 Census)


Change from ../hhmoep/input2010.txt and ../hhmoep/input2020.txt, including 0

 0 Alabama
 0 Alaska
 0 Arizona
 0 Arkansas
-1 California
+1 Colorado
 0 Connecticut
 0 Delaware
+1 Florida
 0 Georgia
 0 Hawaii
 0 Idaho
-1 Illinois
 0 Indiana
 0 Iowa
 0 Kansas
 0 Kentucky
 0 Louisiana
 0 Maine
 0 Maryland
 0 Massachusetts
-1 Michigan
 0 Minnesota
 0 Mississippi
 0 Missouri
+1 Montana
 0 Nebraska
 0 Nevada
 0 New Hampshire
 0 New Jersey
 0 New Mexico
-1 New York
+1 North Carolina
 0 North Dakota
-1 Ohio
 0 Oklahoma
+1 Oregon
-1 Pennsylvania
 0 Rhode Island
 0 South Carolina
 0 South Dakota
 0 Tennessee
+2 Texas
 0 Utah
 0 Vermont
 0 Virginia
 0 Washington
-1 West Virginia
 0 Wisconsin
 0 Wyoming


Change from ../hhmoep/input2010.txt and ../hhmoep/input2020.txt

-1 California
+1 Colorado
+1 Florida
-1 Illinois
-1 Michigan
+1 Montana
-1 New York
+1 North Carolina
-1 Ohio
+1 Oregon
-1 Pennsylvania
+2 Texas
-1 West Virginia
 0 remaining states


EXECUTION LOG:
* Executed: Mon, 26 Apr 2021 16:02:46 -0400
* Script file name: ../hhmoep/hunt_hill_method_change.php
* Input file name 1: ../hhmoep/input2010.txt
* Input file name 2: ../hhmoep/input2020.txt
