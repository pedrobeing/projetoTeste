<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

if(!isset($_SESSION['siteblocked'])):
ob_clean();

$senha = (isset($_POST['senha']))?$_POST['senha']:"";
if(trim($senha)=='abc2021'){
	$_SESSION['siteblocked']="nomore";
	ob_clean();
	header("Location: ".$_SERVER['REQUEST_URI']);
	exit();	
}
?>
<script>
	window.onload = function(){
		document.forms[0].senha.focus();
	};
</script>
<style>
	html,body{ min-width:100%;min-height:100vh; margin:0px; padding:0px; }
	input{ border:1px solid #e9e9e9; border-radius:5px; background-color: #fff; padding: 10px; }
</style>

<table style='width:100%; height: 100vh;' >
	<tr>
		<td align="center" valign="middle" height="100%" >

			<div class="login">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/old/logo-blocked.png" alt="" width='150' />
				<br><br>
				<form action="" method="post" >
					<input type="password" name="senha" />
				</form>
			</div>

		</td>
	</tr>
</table>

<?php
exit();
endif
?>