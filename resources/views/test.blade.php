<!DOCTYPE html>
<html>
<head>
</head>
<body>

        <form action="searchkey" method="get">
            <div class="search_box">
                <input name="search_key" type="text" id="search_key" placeholder="Tôi cần ...">
                <div class="location_city">               
                    <select name="city_list" id="city_list" title="city_list">

                    </select>
                </div>
                <button type="submit" class="button_submit">Tìm kiếm</button>
            </div>
        </form>
        <div>
     <?php foreach ($location as $city): ?>
            <?php echo $city->id;
              echo $city->title;  
              echo $city->description;?>
     <?php endforeach ?>
     </div>
</body>

</html>