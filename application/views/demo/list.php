<body>
    <style>
        .affix {
            position: fixed;
        }
        .bs-docs-sidebar.affix {
            position: fixed;
            top: 20px;
            width: 213px;
        }
        .bs-docs-sidebar {
            padding-left: 20px;
        }
        .bs-docs-sidebar .nav .nav {
            display: none;
            padding-bottom: 10px;
            margin-left: 10px;
        }
        .bs-docs-sidebar .nav>.active>ul {
            display: block;
        }
        .bs-docs-sidebar .nav>li>a {
            display: block;
            padding: 4px 20px;
            font-size: 13px;
            font-weight: 500;
            color: #767676;
        }
        .bs-docs-sidebar .nav .nav>.active:focus>a, .bs-docs-sidebar .nav .nav>.active:hover>a, .bs-docs-sidebar .nav .nav>.active>a {
            padding-left: 28px;
            font-weight: 500;
        }
        .bs-docs-sidebar .nav>.active:hover>a, .bs-docs-sidebar .nav>.active>a {
            padding-left: 18px;
            font-weight: 700;
            color: #563d7c;
            background-color: transparent;
            border-left: 2px solid #563d7c;
            text-decoration: none;
        }
        .bs-docs-sidebar .nav .nav>li>a {
            padding-top: 1px;
            padding-bottom: 1px;
            padding-left: 30px;
            font-size: 12px;
            font-weight: 400;
        }
        .container {
            width: 100%;
        }
        </style>
    <body data-spy="scroll" data-target="#navbar-example">
    <div class="row">
        <div class="container">
            <div class="col-md-9">
            	<?php foreach ($data as $key =>$item):?>
            	<h2 id="demo_<?=$key; ?>"><i class="glyphicon glyphicon-link"></i><?=$item["demo_name"] ?></h2>
            	<?=$item["content"] ?>
            	<?php endforeach;?>
            </div>
            <div class="col-md-3">
                <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix" id="navbar-example">
                    <ul class="nav bs-docs-sidenav">
                    	<?php foreach ($data as $key =>$item):?>
                    	<li>
							<a href="#demo_<?=$key; ?>"><?=$item["demo_name"] ?></a>
	                    	<?=$item["extra_text"] ?>
	                    </li>
			            <?php endforeach;?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script>
    seajs.use(["bootstrap","rainbow"],function(){
        Rainbow.color();
    })
    </script>

</body>
</html>