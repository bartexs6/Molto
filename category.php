<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="style/category.css">
<link rel="stylesheet" href="style/main.css">


<?php
        include_once("page.php");
        Page::generateHeader();
    ?>
        <script>
    function openAnn(id){
        location.assign("ann.php?id=" + id);
    }
</script>
<?php

include_once("connect.php");
include_once("announcement.php");

echo '<div class="mainCat" styl-e="min-height: 90vh;">';

if(isset($_GET["category"]) && !empty($_GET["category"])){

    $category = $_GET["category"];
    echo '<div class="categoryMisc"><h1>Filtry</h1>';
    echo '<form action="category.php" method="get">';
    echo '<input type="text" name="category" value="'.$category.'" hidden>';
    echo '<label for="minPrice">Cena od:</label>';
    echo '<input type="number" name="minPrice" value=0 min=0>';
    echo '<label for="maxPrice">Cena do:</label>';
    echo '<input type="number" name="maxPrice" value=100000 max=100000>';
    echo '<label for="location">Miejscowość:</label>';
    echo '<input type="text" name="location">';
    echo '<label for="sortBy">Sortuj według:</label>';
    echo '<select name="sortBy">
              <option value="createdDesc">Najnowsze</option>
              <option value="priceAsc">Najtańsze</option>
              <option value="priceDesc">Najdroższe</option>
          </select>';
    echo '<input type="submit" value="Wyszukaj ponownie">';
    echo '</form></div>';
    if($category == "motoryzacja" || $category == "elektronika" || $category == "ubrania" || $category == "dom" || $category == "nieruchomosci" || $category == "rozrywka"){

        if(isset($_GET["minPrice"])){
            $minPrice = $_GET["minPrice"];
        }else{
            $minPrice = 0;
        }

        if(isset($_GET["maxPrice"]) && !empty($_GET["maxPrice"])){
            $maxPrice = $_GET["maxPrice"];
        }else{
            $maxPrice = Announcement::MAX_PRICE;
        }

        if(isset($_GET["location"]) && !empty($_GET["location"])){
            $location = $_GET["location"];
        }else{
            $location = "";
        }
        
        if(isset($_GET["sortBy"]) && !empty($_GET["sortBy"])){
             $sortBy = $_GET["sortBy"];
             switch ($sortBy) {
		            case 'priceAsc':
                        $a = Announcement::getByCategory($category, "priceAsc", $minPrice, $maxPrice, $location);
		            break;
		            case 'priceDesc':
                        $a = Announcement::getByCategory($category, "priceDesc", $minPrice, $maxPrice, $location);
		            break;
		            case 'createdDesc':
                        $a = Announcement::getByCategory($category, "createdDesc", $minPrice, $maxPrice, $location);
		            break;
	            default:
		            show_error("Nie znaleziony odpowiedniego sortowania");
		            break;
            }
        }else{
            $a = Announcement::getByCategory($category);
        }


        for ($i=0; $i < count($a); $i++) { 
            echo '<div class="randomAnnCategory">';
            echo '<img src="ann_img/'.$a[$i]->img_link.'" onclick="openAnn('.$a[$i]->id.')">';
            echo '<h3 onclick="openAnn('.$a[$i]->id.')" onclick="openAnn('.$a[$i]->id.')">'.$a[$i]->title.'</h3>';
            echo '<p>'.$a[$i]->date.'</p>';
            echo '<p>'.$a[$i]->value.' PLN</p>';
            echo '<p>'.$a[$i]->location.'</p>';
            echo '</div>';
        }
        
    }
}

echo '</div>';

?>


<script>

let clicked = false;
function addToFav(heartIcon){
    if (!clicked) {
        clicked = true;
        heartIcon.innerHTML = `<i class="fas fa-heart"></i>`;
    } else {
        clicked = false;
        heartIcon.innerHTML = `<i class="far fa-heart"></i>`;
    }
}

</script>

<?php
        Page::generateFooter();
?>
