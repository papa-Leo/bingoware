1. From Start menu execute "EasyPHP-Webserver"
2. From the hidden icons in the task bar make a right-click with the mouse onto the black EasyPHP icon and select "Open Dashboard"
3. This will open the EasyPHP dashboard in the default browser (URL: http://127.0.0.1:10000/).
4. Under the "Modules" heading, click the red "start service" button.
4. Click the black "start service" button. If Windows ask for permission confirm the dialog with "Yes"
5. Navigate to the appropriate URL:
   Local URL Laptop: http://10.0.0.25:888/bingoware/index.php?action=play
   Local URL Desktop: http://10.0.0.18:888/bingoware/index.php?action=play
6. Generate cards and start playing, see steps at the bottom.


SETTINGS:
Page Title:
Welcome to Bingoware


#When viewing one card:

Header:
<center><b><font size="+4">B I N G O</font></b></center>

Footer:
   <center><b>Innerwheel Club of Durbanville</b><br><br><a href="javascript:window.close();">close window</a></center>
   OR:
   <center><b>Rotary Club of Durbanville</b><br><br><a href="javascript:window.close();">close window</a></center>


#When printing four card per page:

Header:
<center><b><font size="+6">Bingo Cards</font></b></center>

Footer:
   <center><b><font size="-1">Inner Wheel Club of Durbanville</font></b></center>
   OR:
   <center><b><font size="-1">Rotary Club of Durbanville</font></b></center>


# The setup for 7 games with 5 cards:
0.  See C:\Users\danie\Dropbox\SharedFiles\Bingo\Bingo Calculations.xlsx
1.  In Bingoware click on "Configure"
2.  Enter the Set ID like 'A' where you like to generate cards for, this letter will be pre-padded to the number on each card
    It does not matter which "Winning Patterns" are selected, this can be done dynamically when actually playing.
3.  Click on the Change! button
4.  Click on 'Generate Cards' and enter the number of cards required
5.  Click "Print Cards" and print the cards on paper or to PDF for later printing. Saving to PDF works better in Google Chrome.
6.  To generate more cards for different games repeat the steps 2 to 5 and change the letter to 'B', then to 'C', etc.
7.  To start the game for the cards based on the 'A' letter click on Configure
8.  Ensure the Set ID is on 'A'
9.  Tick the desired "Winning Patterns"
10. Click on the Change! button
11. Click 'Play Bingo'
12. If not all cards were handed out then limit the 'Number of cards in play for set'
13. To start playing click on the "Give Me a Number!" button.


# Tips for printing the cards:
1. Each PDF document needs to be printed onto a different colored A4 paper, so you will have 5 different colored stacks of paper (one can be white).
2. Each PDF document/file refers to ONE color. It is very important to not mix this up. So all yellow (or whatever other color you have) sheets need to have a Card Number starting with "A" (see image below), all green sheets need to have a Card Number starting with "B" and so on.
3. Each A4 page contains 4 Bingo cards for better paper efficiency/use. This needs to be cut e.g. with a paper cutting machine or somebody with a very steady hand.
4. Staple each set of cards together to create a booklet.
5. Keep/Sell/Handout the booklets in sequence of card numbers so in case there are left over booklets, I can exclude booklets e.g. as of card number 120 from the game.
   To exclude cards from the game type in the number of handed out booklets into field 'Number of cards in play for set'.
6. Adjust the colors in file Bingo Calculations.xlsx to match the actual paper color.
