
<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Assign Room';
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
            <label for="inputEmail4" class="form-label">Customer Name</label>
            <input type="text" class="form-control" required placeholder="Ex.253-A" name="cname" id="inputEmail4">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">No of Person</label>
            <input type="number" class="form-control" required placeholder="Ex.253-A" name="no_of_person" id="inputEmail4">
        </div>
        <div class="col-md-6">
            <label for="inputAddress" class="form-label">No of days</label>
            <input type="text" class="form-control" required id="inputAddress" name="days"  placeholder="Ex. 2FT X 8FT ">
        </div>

        <div class="col-md-6">
            <label for="inputAddress" class="form-label">Assign Date</label>
            <input type="date" class="form-control" required id="inputAddress" name="date"  placeholder="Ex. 2FT X 8FT ">
        </div>

        <div class="col-md-6">
            <label for="inputAddress" class="form-label">Assign Time</label>
            <input type="time" class="form-control" required id="inputAddress" name="time"  placeholder="Ex. 2FT X 8FT ">
        </div>

        <div class="col-md-6">
            <label for="inputAddress" class="form-label">Price</label>
            <input type="number" min="0" class="form-control" required name="price"  placeholder="Ex. 2FT X 8FT ">
        </div>

            <div style="col-md-6">
                <button type="submit" class="btn btn-primary">Assign Room</button>
                &nbsp;
                <a href="/yii/basic/web/hotel/dashboard" class="btn btn-primary">Cancel </a>
            </div>


    </form>
    <br>
    <!--Gutter Ends-->
</div>
</body>
</html>