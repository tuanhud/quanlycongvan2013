<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="#" class="round button dark ic-left-arrow image-left">Go to website</a></li>
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong><?php echo $user ?></strong></a>
					<ul>
						<li><a href="#">My Profile</a></li>
						<li><a href="#">User Settings</a></li>
						<li><a href="#">Change Password</a></li>
						<li><a href="../module/logout.php">Log out</a></li>
					</ul> 
				</li>
			
				<li><a href="#" class="round button dark menu-email-special image-left">3 new messages</a></li>
				<li><a href="../module/logout.php" class="round button dark menu-logoff image-left">Log out</a></li>
				
			</ul> <!-- end nav -->

					
			<form action="timkiem.php" method="POST" id="search-form" class="fr">
				<fieldset>
					<input type="text" id="keyword" name = "keyword" class="round button dark ic-search image-right" placeholder="Search..." />
					<input type="hidden" value="SUBMIT" />
				</fieldset>
			</form>

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->