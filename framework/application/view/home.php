<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html dir="ltr">

<head>
<script type="text/javascript"
	src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="/js/ajaxfileupload.js"></script>
<style type="text/css">
body,html {
	font-family: helvetica, arial, sans-serif;
	font-size: 90%;
}
</style>
<script
	src="http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojo/dojo.xd.js"
	djConfig="parseOnLoad: true">
        </script>
<title>Groupd</title>
<script type="text/javascript" src="js/layout.js"></script>
<script type="text/javascript" src="js/group.js"></script>
<script type="text/javascript" src="js/member.js"></script>
<link rel="stylesheet" type="text/css"
	href="http://ajax.googleapis.com/ajax/libs/dojo/1.6/dijit/themes/claro/claro.css" />
<style type="text/css">
@import
	"http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojox/grid/resources/Grid.css"
	;

@import
	"http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojox/grid/resources/claroGrid.css"
	;@import "/css/screen.css";

</style>
</head>

<body class="claro">
<div id="site_search_holder">
<input dojoType="dijit.form.TextBox" placeholder="Search..." id="site_search" />
<ul id="site_search_autocomplete">
	<li>
		<img src="http://img.onesocialworld.co.uk/person.png" />
		<h2>Test 1</h2>
		<span>Test subtext</span>
	</li>
	<li>
		<img src="http://img.onesocialworld.co.uk/person.png" />
		<h2>Test 2</h2>
		<span>Test subtext</span>
	</li><li>
		<img src="http://img.onesocialworld.co.uk/person.png" />
		<h2>Test 3</h2>
		<span>Test subtext</span>
	</li><li>
		<img src="http://img.onesocialworld.co.uk/person.png" />
		<h2>Test 4</h2>
		<span>Test subtext</span>
	</li><li>
		<img src="http://img.onesocialworld.co.uk/person.png" />
		<h2>Test 5</h2>
		<span>Test subtext</span>
	</li>
</ul>
</div>
<h1>Lichfield Explorer Scouts</h1>
<div data-dojo-type="dijit.MenuBar" id="navMenu">
<div data-dojo-type="dijit.PopupMenuBarItem"><span> Group </span>
<div data-dojo-type="dijit.Menu" id="groupMenu">
<div data-dojo-type="dijit.MenuItem"
	data-dojo-props="onClick:function(){alert('file 1');}">Change Group</div>
<div data-dojo-type="dijit.MenuItem"
	data-dojo-props="onClick:function(){alert('file 2');}">Delete Group</div>
</div>
</div>
<div data-dojo-type="dijit.PopupMenuBarItem"><span> Members </span>
<div data-dojo-type="dijit.Menu" id="memberMenu">
<div data-dojo-type="dijit.MenuItem"
	data-dojo-props="onClick:function(){alert('file 1');}">Add Member</div>
<div data-dojo-type="dijit.PopupMenuItem"><span>Import</span>
<div data-dojo-type="dijit.Menu">
<div data-dojo-type="dijit.MenuItem"
	data-dojo-props="onClick:function(){Member.importDofEDialog();}">eDofE
</div>
</div>
</div>
<div data-dojo-type="dijit.MenuItem"
	data-dojo-props="onClick:function(){alert('file 2');}">Export Sign-in
sheet</div>
</div>
</div>
<div data-dojo-type="dijit.PopupMenuBarItem"><span> Achievements </span>
<div data-dojo-type="dijit.Menu" id="achievementMenu">
<div data-dojo-type="dijit.MenuItem"
	data-dojo-props="onClick:function(){alert('edit 1');}">Setup Achievement
</div>
<div data-dojo-type="dijit.MenuItem"
	data-dojo-props="onClick:function(){alert('edit 2');}">Remove
Achievement</div>
</div>
</div>
</div>


<div dojoType="dijit.layout.TabContainer"
	style="width: 100%; height: 90%;">
<div dojoType="dijit.layout.ContentPane" title="Members" selected="true">
<div dojoType="dijit.layout.BorderContainer" design="sidebar"
	gutters="true" liveSplitters="true" id="membersContainer">

<div dojoType="dijit.layout.ContentPane" splitter="true"
	region="leading" style="width: 260px;">
<div dojoType="dijit.layout.TabContainer"
	style="width: 100%; height: 100%;">
<div dojoType="dijit.layout.ContentPane" title="All" selected="true">
<div id="member_list" style="width: 100%; height: 100%;"></div>
</div>
<div dojoType="dijit.layout.ContentPane" title="Tag" selected="true">
Tree view of users by tag</div>
</div>
</div>
<div dojoType="dijit.layout.ContentPane" splitter="true" region="center"
	id="membersMain">Members Panel</div>
</div>
</div>
<div dojoType="dijit.layout.ContentPane" title="Funding">
<div dojoType="dijit.layout.BorderContainer" design="sidebar"
	gutters="true" liveSplitters="true" id="fundingContainer">

<div dojoType="dijit.layout.ContentPane" splitter="true"
	region="leading" style="width: 240px;">
<div dojoType="dijit.layout.TabContainer"
	style="width: 100%; height: 100%;">
<div dojoType="dijit.layout.ContentPane" title="Applications"
	selected="true">Applications</div>
<div dojoType="dijit.layout.ContentPane" title="Favourites"
	selected="true">Favourite Funders</div>
<div dojoType="dijit.layout.ContentPane" title="Search" selected="true">
Funding search</div>
</div>
</div>
<div dojoType="dijit.layout.ContentPane" splitter="true" region="center">
Hi, I'm center</div>
</div>
</div>
<div dojoType="dijit.layout.ContentPane" title="Events"></div>
<div dojoType="dijit.layout.ContentPane" title="Statistics">Statistics
on users, funding et al, Good for funding application data, and
targetted marketing</div>
</div>



</body>

</html>
