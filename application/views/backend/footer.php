<!-- Footer -->
<footer class="main">
	&copy; <?php echo date('Y');?> <strong> <?php echo $this->db->get_where('settings' , array('type'=>'system_name'))->row()->description; ?></strong>
</footer>
