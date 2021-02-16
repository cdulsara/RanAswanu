<Script>
    $(function () {

        $.ajax({ 
            type: 'GET', 
            url: 'ajxGetCropTypes', 
            success: function (data) { 
                var json = $.parseJSON(data);
                $(json).each(function (i, val) {
                    // console.log(val.crop_type);
                    var newOp = new Option(val.crop_type, val.crop_type);
                    $(newOp).html(val.crop_typeal);
                    $('#cropType').append(newOp);
                }); 
            }
        });

        $('#cropType').change(function () {
            var type = $(this).val();
            $('#cropVart').empty();
            $.ajax({ 
                type: 'GET', 
                url: 'ajxGetCropVart', 
                data: {type:type},
                success: function (data) { 
                    var json = $.parseJSON(data);
                    $(json).each(function (i, val) {
                        var newOp = new Option(val.crop_varient, val.crop_varient);
                        $(newOp).html(val.crop_varient);
                        $('#cropVart').append(newOp);
                    }); 
                }
            });
        });


    });
</Script>

<h1>Crop Reqeust Form</h1>


<div class="main-form">
    <form action="<?= URL; ?>/farmer/insertCropReq" method="post">


        <div class="row">
            <div class="col-25">
                <label for="province">Province</label>
            </div>
            <div class="col-75">
                <select id="province" name="province">
                    <option value="null"> -- SELECT PROVINCE -- </option>
                    <?php foreach ($provinces as $provinceItem) : ?>
                    <option value="<?= $provinceItem['province_id'] ?>">
                        <?= $provinceItem['province_name'] ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="district">District</label>
            </div>
            <div class="col-75">
                <select id="district" name="district">
                    <option value="null"> -- SELECT DISTRICT --</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="province">Divisional secratariast</label>
            </div>
            <div class="col-75">
                <select id="divisional_secratariast" name="divisional_secratariast">
                    <option value="null"> -- SELECT DIVISIONAL SECT. --</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="grama">Gramasewa Division</label>
            </div>
            <div class="col-75">
                <select id="gramaSewa" name="gramaSewa">
                    <option value="null"> -- SELECT GRAMASEWA DIV. --</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="address">Address of the land</label>
            </div>

            <div class="col-75">
                <input type="text" id="address" name="address" placeholder="ex: No. 32, Atha watunu wava, Horawpathana"
                    required>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="croptype">Crop type:</label>
            </div>

            <div class="col-75">
                <select id="cropType" name="croptype" required>
                    <option selected disabled>-- Select Crops --</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="selectCrop">Crop Varient:</label>
            </div>
            <div class="col-75">
                <select id="cropVart" name="selectCrop" required>
                    <option value="" disabled selected>-- Select crop varient --</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="areaSize">Expect area size to cultivate -Acres</label>
            </div>

            <div class="col-75">
                <input type="number" placeholder="ex: 2 Acres" id="areaSize" max="100" required>
            </div>
        </div>

        <div style="background:yellow" id="expectedHarv">Expected : kgs</div>

        <div class="row">
            <div class="col-25">
                <label for="exptdate">Cultivating date (start month)</label>
            </div>
            <div class="col-75">
                <input type="date" id="exptDate" name="exptdate" placeholder="Month/Date/Year " required>
            </div>
        </div>

        <div style="background:yellow" id="harvestMonth">harvestMonth : kgs</div>


        <div class="row">
            <div class="col-25">
                <label for="otherdetails">Other details:</label>
            </div>
            <div class="col-75">
                <textarea id="otherdetails" name="otherdetails" placeholder="Enter other details "
                    style="height:200px "></textarea>
            </div>
        </div>


        <div class="row">
            <div class="col-25">

            </div>
            <div class="col-75">
                <input type="submit" value="Submit">
            </div>
        </div>


    </form>
</div>

<script src="<?php echo URL; ?>/views/user/js/locations.js"></script>