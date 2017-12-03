<!doctype html>
<div class="your-games-container">
        <div class="main-games-container">
        <div class="main-games-text">YOUR GAMES</div>
   
            <?php include("yourgames.php"); ?>
        </div>
        <div class="other-games-container">
        <div class="main-games-text">OTHER GAMES</div>
            
            <?php include("othergames.php"); ?>
            
           <!-- <div class="game" id="game-1">
                <table class="game-table">
                    <tr class="team-1-container">
                        <th class="team-1-image">IMAGE</th>
                        <td class="team-1-name">Team 1</td>
                        <td class="team-1-score">3</td>
                    </tr>
                    <tr class="team-2-container">
                        <th class="team-2-image">IMAGE</th>
                        <td class="team-2-name">Team 2</td>
                        <td class="team-2-score">4</td>
                    </tr>
                </table>                
                <span class="bet-container" id="bet-success" style="display:none;">
                    <div class="bet-s-text">Your bet was<br>processed!</div>
               </span>
               <span class="bet-container" id="bet-result" style="display:none;">
                    <div class="bet-text">Your bet was </div>
                    <div class="bet-amount">x coins</div>
               </span>
                <form class="bet-container-form" id="bet-form">
                    <select name="teamname">
                      <option value="1">Team 1</option>
                      <option value="2">Team 2</option>
                    </select>
                    <input type="number" step="1" name="betinput" class="bet-input"><br>
                    <input type="submit" name="submit" class="bet-button" value="Bet"/>
                </form>
            </div> -->
        </div>
</div>
</html>