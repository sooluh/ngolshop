<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= set_title($page) ?></title>
	<link rel="canonical" href="<?= current_url() ?>">

	<?php include VIEWPATH . '/app/includes/meta.php' ?>

	<link rel="stylesheet" href="<?= base_url('assets/css/dropify.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
	<div class="wrapper">
		<?php include VIEWPATH . '/app/includes/sidebar.php' ?>

		<div class="main">
			<?php include VIEWPATH . '/app/includes/navbar.php' ?>

			<main class="content">
				<form action="<?= current_url() ?>" method="POST" enctype="multipart/form-data" class="container-fluid p-0 needs-validation" novalidate="">
					<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />

					<button type="submit" class="btn btn-primary float-end mt-n1">
						<i class="fas fa-save"></i>
						Simpan
					</button>

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle"><?= $page ?></h1>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-body">
									<div class="mb-3">
										<label class="form-label" for="name">
											Nama Produk
											<span class="text-danger">*</span>
										</label>
										<input type="text" class="form-control" id="name" name="name" placeholder="Nama Produk" required="">
										<div class="invalid-feedback">
											Nama produk tidak boleh kosong.
										</div>
									</div>

									<div class="mb-3">
										<label class="form-label" for="type">
											Satuan
											<span class="text-danger">*</span>
										</label>
										<select name="type" id="type" class="form-control" required="">
											<option value="">-- Pilih Satuan --</option>
											<?php foreach (types() as $value => $text) : ?>
												<option value="<?= $value ?>"><?= $text ?></option>
											<?php endforeach ?>
										</select>
										<div class="invalid-feedback">
											Satuan produk tidak boleh kosong.
										</div>
									</div>

									<div class="mb-3">
										<label class="form-label" for="stock">
											Stok
											<span class="text-danger">*</span>
										</label>
										<input type="number" class="form-control" id="stock" name="stock" placeholder="Stok Produk" required="">
										<div class="invalid-feedback">
											Stok produk tidak boleh kosong.
										</div>
									</div>

									<div class="mb-0">
										<label class="form-label" for="price">
											Harga Satuan
											<span class="text-danger">*</span>
										</label>
										<input type="number" class="form-control" id="price" name="price" placeholder="Harga" required="">
										<div class="invalid-feedback">
											Harga produk tidak boleh kosong.
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="card">
								<div class="card-body">
									<label for="image" class="form-label">
										Gambar
										<span class="text-danger">*</span>
									</label>
									<input type="file" id="image" name="image" class="form-control dropify" data-allowed-file-extensions="png jpg jpeg gif webp" required="" />
								</div>
							</div>
						</div>
					</div>
				</form>
			</main>

			<?php include VIEWPATH . '/app/includes/footer.php' ?>
		</div>
	</div>

	<?php include VIEWPATH . '/app/includes/script.php' ?>
	<script src="<?= base_url('assets/js/dropify.js') ?>"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			$('.dropify').dropify();

			Array.prototype.slice
				.call(document.querySelectorAll('.needs-validation'))
				.forEach(function(form) {
					form.addEventListener('submit', function(evt) {
						if (!form.checkValidity()) {
							evt.preventDefault();
							evt.stopPropagation();
						}

						form.classList.add('was-validated');
					}, false);
				});
		});
	</script>
</body>

</html>
