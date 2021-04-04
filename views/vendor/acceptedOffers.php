<script>
    $(function() {
        $('#box').html('');
        $.ajax({
            url: "ajxacceptedOffers",
            method: "post",
            data: {

            },
            dataType: "text",
            success: function(data) {
                $('#box').html(data);
            },
            async: true,
        });


        // var selectedSort = 'max_offer';
        // $('#sortby').change(function() {
        //     selectedSort = $('#sortby :selected').attr('val');
        // });
        // // asc
        // $('#ascSort').click(function() {

        //     $('#descSort').removeClass("active-btn");
        //     $(this).addClass("active-btn");
        //     $.ajax({
        //         url: "ajxSortAcceptedCrops",
        //         method: "post",
        //         data: {
        //             filter: selectedSort,
        //             ascOrDsc: 'ASC'
        //         },
        //         dataType: "text",
        //         success: function(data) {

        //             $('#box').html(data);
        //         },
        //         async: true
        //     });
        // });

        // //descending 
        // $('#descSort').click(function() {
        //     //alert(selectedSort)
        //     $('#ascSort').removeClass("active-btn");
        //     $(this).addClass("active-btn");
        //     $.ajax({
        //         url: "ajxSortAcceptedCrops",
        //         method: "post",
        //         data: {
        //             filter: selectedSort,
        //             ascOrDsc: 'DESC'
        //         },
        //         dataType: "text",
        //         success: function(data) {

        //             $('#box').html(data);
        //         },
        //         async: true
        //     });
        // });

        //search
        var selectedSearchCategory = $('#searchField').val();

        $('#searchField').change(function() {
            selectedSearchCategory = $(this).val();
            // $('#test').html(selectedCategory);
        });

        $('#searchBtn').click(function(event) {
            event.preventDefault();
            var input = $('#searchInput').val();
            if (input != '') {
                location.reload();
                $('#searchInput').val('');
            }

        });

        $("#searchInput").keyup(function() {
            var inputVal = $(this).val();
            if (inputVal != '') {
                $('#box').html('');
                switch (selectedSearchCategory) {
                    case 'crop_type': {
                        $.ajax({
                            url: "ajxSearchAcceptedCrops",
                            method: "post",
                            data: {
                                search: inputVal
                            },
                            dataType: "text",
                            success: function(data) {
                                $('#box').html(data);
                            },
                            async: true,
                        });
                        break;
                    }
                    case 'farmer_user_id': {
                        $.ajax({
                            url: "ajxSearchAcceptedCropsid",
                            method: "post",
                            data: {
                                search: inputVal
                            },
                            dataType: "text",
                            success: function(data) {
                                $('#box').html(data);
                            },
                            async: true,
                        });
                        break;
                    }
                }
            } else {
                location.reload();
            }
        });





    });
</Script>

<h1>Accepted Offers</h1>

<div class="user-tabs">
    <ul>

        <li><a id="tab1" href="#" class="active-tab">All</a></li>

    </ul>


</div>

<div class="tabContainer" id="tab1C">
    <div class="panel-container">

        <div class="pane1">

            <form class="search-bar">
                <label>Search Crops by : </label>
                <select id="searchField">
                    <option value="crop_type">Crops Name</option>
                    <option value="farmer_user_id">Farmer-id</option>
                </select>
                <input type="text" id="searchInput" placeholder="Search ...">
                <button type="button" id="searchBtn"><i class="fas fa-eraser"></i></button>
            </form>

        </div>


        <!-- <div class="pane2">
            <form class="normal-select">
                <label>Sort crop requests by : </label>
                <select id="sortby">

                    <option val="date_time">date_time</option>
                    
                </select>

                <button type="button" id="ascSort" class="half"><i class="fas fa-sort-amount-down-alt"></i> Ascending </button>
                <button type="button" id="descSort" class="half"><i class="fas fa-sort-amount-down"></i> Descending</button>
            </form>
        </div> -->


    </div>



    <div id="box" class="main-table">

    </div>

</div>