<?php
require_once '../bootstrap.php';
use CT275\Labs\Contact;
$contact = new Contact($PDO);

$id = isset($_REQUEST['id']) ?
filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT) : -1;
if ($id < 0 || !($contact->find($id))) {
redirect(BASE_URL_PATH);
}
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if ($contact->update($_POST)) {
// Cập nhật dữ liệu thành công
redirect("index.php");
}
// Cập nhật dữ liệu không thành công
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
						<p class="wow fadeIn" data-wow-duration="2s">Update your contacts here.</p>
					</div>
				</div>

				<div class="inner-wrapper row">
					<div class="col-md-12">

						<form name="frm" id="frm" action="" method="post" class="col-md-6 col-md-offset-3" enctype='multipart/form-data'>

							<input type="hidden" name="id" value="<?= htmlspecialchars($contact->getId()) ?>">

							<!-- Name -->
							<div class="form-group<?= isset($errors['name']) ? ' has-error' : '' ?>">
								<label for="name">Name</label>
								<input type="text" name="name" class="form-control" maxlen="255" id="name" placeholder="Enter Name" value="<?= htmlspecialchars($contact->name) ?>" />

								<?php if (isset($errors['name'])) : ?>
									<span class="help-block">
										<strong><?= htmlspecialchars($errors['name']) ?></strong>
									</span>
								<?php endif ?>
							</div>

							

							<!-- Description -->
							<div class="form-group<?= isset($errors['price']) ? ' has-error' : '' ?>">
								<label for="description">price </label>
								<input name="price" id="price" class="form-control" placeholder="Enter price" value="<?= htmlspecialchars($contact->price) ?>" />

								<?php if (isset($errors['price'])) : ?>
									<span class="help-block">
										<strong><?= htmlspecialchars($errors['price']) ?></strong>
									</span>
								<?php endif ?>
							</div>

							<div class="form-group<?= isset($errors['Type']) ? ' has-error' : '' ?>">
								<label for="Type">Type</label>
								<input type="text" name="Type" class="form-control" maxlen="255" id="Type" placeholder="Enter Type" value="<?= htmlspecialchars($contact->Type) ?>" />

								<?php if (isset($errors['Type'])) : ?>
									<span class="help-block">
										<strong><?= htmlspecialchars($errors['Type']) ?></strong>
									</span>
								<?php endif ?>
							</div>
							
							<div class="form-group">
								
							<input type="file" name="files" multiple  />

								<?php if (isset($errors['Type'])) : ?>
									<span class="help-block">
										<strong><?= htmlspecialchars($errors['Type']) ?></strong>
									</span>
								<?php endif ?>
							</div>

							<!-- Submit -->
							<button type="submit" name="submit" id="submit" class="btn btn-primary">Update Products</button>
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