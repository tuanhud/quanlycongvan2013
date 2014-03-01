<div id="header-with-tabs">
		
		<div class="page-full-width cf">
		
			<ul id="tabs" class="fl">
				
				
				<?php
			 $queryParent = mysql_query("SELECT idMenu,nameMenu,linkMenu,titleMenu FROM hmenu 
WHERE isPublished = '1' order by vitri ASC ");$i=0;
        while($pr = mysql_fetch_assoc($queryParent))
        {
          ?>
                <li>
                     <a href="<?php echo $pr['linkMenu']; ?>" title="<?php echo $pr['titleMenu']; ?>" class="<?php echo $b[$i]; ?>" >
            <?php echo $pr['nameMenu']; ?></a>
                </li>
        <?php $i++;
                        
        } // end menu parent
        ?>
				
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			
	