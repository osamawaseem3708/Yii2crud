
<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Category';
?>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/yii/basic/web/css/hotel.css">
</head>
<body id="dashboard">
<!--Gutter Start-->
<div class="container" id="container_dashboard">
    <form class="row g-3" method="post">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Room Number</label>
            <input type="text" class="form-control" required placeholder="Ex.253-A" name="room_num" id="inputEmail4">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Hotel Name</label>
            <select id="inputState" required name="hotel_id" class="form-select">-->
                <option selected>Choose...</option>
                <option value="Galaxy Royal">Galaxy Royal </option>
                <option value="Royal Palace">Royal Palace</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputAddress" class="form-label">Room Size</label>
            <input type="text" class="form-control" required id="inputAddress" name="rsize"  placeholder="Ex. 2FT X 8FT ">
        </div>


        <div class="col-md-6">
            <label for="inputAddress" class="form-label">Room Status</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" required name="status" id="inlineRadio1" value="Active">
                <label class="form-check-label" for="inlineRadio1">Active</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" required name="status" id="inlineRadio2" value="nonActive">
                <label class="form-check-label" for="inlineRadio2">Non Active</label>
            </div>
        </div>

        <div class="col-12">
            <label for="inputAddress" class="form-label">Room Size</label>
            <textarea type="text" class="form-control" name="rdescription" required placeholder="Room Description"></textarea>
        </div>

            <div style="col-md-6">
                <button type="submit" class="btn btn-primary">Create Room</button>
                &nbsp;
                <a href="/yii/basic/web/hotel/dashboard" class="btn btn-primary">Cancel </a>
            </div>


    </form>
    <br>
    <!--Gutter Ends-->
</div>
</body>
</html>