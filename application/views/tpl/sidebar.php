<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="<?php echo base_url('neko-admin/dashboard');?>"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard Home</a></li>
			<li><a href="<?php echo base_url('neko-admin/addblog');?>"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Write New Blog</a></li>
			<li><a href="<?php echo base_url('neko-admin/posts');?>"><svg class="glyph stroked notepad"><use xlink:href="#stroked-notepad"></use></svg> View All My Blogs</a></li>
			<li><a href="<?php echo base_url('neko-admin/comments');?>"><svg class="glyph stroked empty message"><use xlink:href="#stroked-empty-message"/></svg> </svg> Blog Comments</a></li>
			<li><a href="<?php echo base_url('neko-admin/addpage');?>"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Add Page Category</a></li>
			<li><a href="<?php echo base_url('neko-admin/pages');?>"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>View All Page Category</a></li>
			<li><a href="<?php echo base_url('neko-admin/inbox');?>"><svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg> Unread Messages</a></li>
			<li><a href="<?php echo base_url('neko-admin/logout');?>"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"/></svg> Logout <?php  echo $this->session->userdata('nickname');?></a></li>

	</div>