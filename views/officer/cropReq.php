<h1>Crop Requests</h1>

<div class="user-tabs">
    <ul>
    <? foreach($tabs as $tab) :?>
        <li><a href="#"><?=$tab?></a></li>
    <? endforeach; ?>
    </ul>
</div>
<div class="filter-panel">
    <div class="pane1">
        <ul>
            <li id="sortByLbl">
                <label for="radio">Sort by</label></li>
            <li>
                <label class="container">Acending
                    <input type="radio" checked="checked" name="radio">
                    <span class="checkmark"></span>
                </label>
            </li>
            <li>
                <label class="container">Decending
                    <input type="radio" name="radio">
                    <span class="checkmark"></span>
                </label>
            </li>
        </ul>                    
    </div>
    <div class="pane2">
        <!-- panel2                     -->
    </div>
    <div class="pane3">
        <label for="filter4">Sort by</label>
        <select id="filter4" name="filter4">
            <option value="australia">Date</option>
            <option value="canada">Amount</option>
            <option value="usa">Time</option>
        </select>                    
    </div>
    <div class="pane4"> 
        <label for="filter5">Search by</label>
        <select id="filter5" name="filter5">
            <option value="australia">Crop</option>
            <option value="canada">Area</option>
            <option value="usa">Officer</option>
        </select>                
    </div>
</div>

<div class="main-table">
    <table>
        <tr>
            <th>#</th>
            <th>Farmer-ID</th>
            <th>Farmer Name</th>
            <th>Crop Type</th>
            <th>Action</th>
        </tr>
<? foreach($cropReqData as $cropReqItem) :?>
    
        <tr>
            <td><?=$cropReqItem['farmerId'];?> </td>
            <td><?=$cropReqItem['farmerName'];?> </td>
            <td> <?=$cropReqItem['cropType'];?></td>
            <td><button class="mini-button normal">Accept</button> </td>
            <td><button class="mini-button danger">Reject</button> </td>
        </tr>
<?endforeach;?>
    </table>
</div>