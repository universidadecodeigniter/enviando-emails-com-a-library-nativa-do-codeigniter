<?php $this->load->view('commons/cabecalho'); ?>

<div class="container">
	<div class="page-header">
		<h1>Enviando emails com a library nativa do CodeIgniter</h1>
	</div>
	<p class="lead">Preencha os campos abaixo para enviar as informações por email.</p>

	<?php if ($this->session->flashdata('success') == TRUE): ?>
		<div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
	<?php endif; ?>

	<?php if ($this->session->flashdata('error') == TRUE): ?>
		<div class="alert alert-warning"><?= $this->session->flashdata('error'); ?></div>
	<?php endif; ?>

	<form method="POST" action="<?=base_url('enviar-email')?>">
		<div class="form-group">
			<label>Seu nome</label>
			<input type="text" name="nome" class="form-control" required/>
		</div>
		<div class="form-group">
			<label>Seu email</label>
			<input type="email" name="email" class="form-control" required/>
		</div>
		<div class="form-group">
			<label>Uma mensagem pra você</label>
			<textarea class="form-control" name="mensagem" rows="6" required></textarea>
		</div>
		<div class="checkbox">
			<label><input type="checkbox" name="anexo"/><strong>Enviar anexo</strong></label>
		</div>
		<div class="checkbox">
			<label><input type="checkbox" name="template"/><strong>Usar template</strong></label>
		</div>
		<div class="form-group">
			<input type="submit" value="Enviar" class="btn btn-success"/>
		</div>
	</form>

</div>

<?php $this->load->view('commons/rodape'); ?>
