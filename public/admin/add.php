<?php
include "../bootstrap.php";

use CT275\Labs\Contact;
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$contact = new Contact($PDO);
$contact->fill($_POST);
if ($contact->validate()) {
$contact->save() && redirect("index.php");
}
$errors = $contact->getValidationErrors();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Contacts</title>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= BASE_URL_PATH . "css/sticky-footer.css" ?>" rel=" stylesheet">
	<link href="<?= BASE_URL_PATH . "css/font-awesome.min.css" ?>" rel=" stylesheet">
	<link href="<?= BASE_URL_PATH . "css/animate.css" ?>" rel=" stylesheet">
</head>

<body>
	

	<!-- Main Page Content -->
	<div class="container">
		<section id="inner" class="inner-section section">
			<div class="container">

				<!-- SECTION HEADING -->
				<h2 class="section-heading text-center wow fadeIn" data-wow-duration="1s">Contacts</h2>
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center">
						<p class="wow fadeIn" data-wow-duration="2s">Add your contacts here.</p>
					</div>
				</div>

				<div class="inner-wrapper row">
					<div class="col-md-12">

						<form name="frm" id="frm" action="" method="post" class="col-md-6 col-md-offset-3" enctype='multipart/form-data'>

							<!-- Name -->
							<div class="form-group<?= isset($errors['name']) ? ' has-error' : '' ?>">
								<label for="name">Name</label>
								<input type="text" name="name" class="form-control" maxlen="255" id="name" placeholder="Enter Name" value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>" />

								<?php if (isset($errors['name'])) : ?>
									<span class="help-block">
										<strong><?= htmlspecialchars($errors['name']) ?></strong>
									</span>
								<?php endif ?>
							</div>

							<!-- Phone -->
							<!-- <div class="form-group<?= isset($errors['phone']) ? ' has-error' : '' ?>">
								<label for="phone">Phone Number</label>
								<input type="text" name="phone" class="form-control" maxlen="255" id="phone" placeholder="Enter Phone" value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>" />

								<?php if (isset($errors['phone'])) : ?>
									<span class="help-block">
										<strong><?= htmlspecialchars($errors['phone']) ?></strong>
									</span>
								<?php endif ?>
							</div> -->

							<!-- Description -->
							<div class="form-group<?= isset($errors['price']) ? ' has-error' : '' ?>">
								<label for="description">price </label>
								<input name="price" id="price" class="form-control" placeholder="Enter price"><?= isset($_POST['price']) ? htmlspecialchars($_POST['price']) : '' ?></input>

								<?php if (isset($errors['price'])) : ?>
									<span class="help-block">
										<strong><?= htmlspecialchars($errors['price']) ?></strong>
									</span>
								<?php endif ?>
							</div>

							<div class="form-group<?= isset($errors['Type']) ? ' has-error' : '' ?>">
								<label for="Type">Type</label>
								<input type="text" name="Type" class="form-control" maxlen="255" id="Type" placeholder="Enter Type" value="<?= isset($_POST['Type']) ? htmlspecialchars($_POST['Type']) : '' ?>" />

								<?php if (isset($errors['Type'])) : ?>
									<span class="help-block">
										<strong><?= htmlspecialchars($errors['Type']) ?></strong>
									</span>
								<?php endif ?>
							</div>
							<div>
							<input type="file" name="files" multiple />
							</div>
							<!-- Submit -->
							<button type="submit" name="submit" id="submit" class="btn btn-primary">Add Products</button>
						</form>

					</div>
				</div>

			</div>
		</section>
	</div>



	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="<?= BASE_URL_PATH . "js/wow.min.js" ?>"></script>
	<script>
		$(document).ready(function() {
			new WOW().init();
		});
	</script>
</body>

</html>