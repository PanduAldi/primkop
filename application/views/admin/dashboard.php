<div id="dashoard">
<div class="jumbotron">
	<div class="container">
		<h1>Hello, <?php echo ucwords($this->session->userdata('nama')) ?></h1>
		<p>Selamat Datang di Admin Panel CARAKA <?php echo strtoupper($this->session->userdata('subdomain')) ?></p>
		<p>
			<a class="btn btn-primary btn-lg">Learn more</a>
		</p>
	</div>
</div>
</div>