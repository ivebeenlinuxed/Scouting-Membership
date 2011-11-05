dojo.require("dijit.layout.ContentPane");
dojo.require("dijit.layout.BorderContainer");
dojo.require("dijit.MenuBar");
dojo.require("dijit.PopupMenuBarItem");
dojo.require("dijit.Menu");
dojo.require("dijit.MenuItem");
dojo.require("dijit.Dialog");
dojo.require("dijit.PopupMenuItem");
dojo.require("dijit.layout.TabContainer");
dojo.require("dijit.layout.LayoutContainer");
dojo.require("dijit.form.TextBox");
dojo.require("dojox.grid.DataGrid");
dojo.require("dojox.data.JsonRestStore");
dojo.require("dijit.form.FilteringSelect");
dojo.require("dijit.form.DateTextBox");
dojo.require('dojo.parser');

ajaxDigitPanel = function(id, data) {
	/*
	dijit.registry.forEach(function(id) {
			return function(widget) {
	        //remove this check if you want to unregister all widgets
	        if ($("#"+widget.id, $("#"+id)).length > 0) { 
	            widget.destroyRecursive();
	        }
		};
    }(id));
    */
	p = dijit.byId("membersMain").destroyDescendants();
	dijit.byId("membersMain").setContent(data);
	
	//$("#"+id).html(data);
	//dojo.parser.parse($("#"+id).get(0));
};

$(document).ready(function() {
	$("input").live("keyup", function() {
		model = this.id.substring(0, this.id.indexOf("_"));
		field = this.id.substring(this.id.indexOf("_")+1);
		switch (model) {
		case "member":
			Member.setAttribute(field, this.value);
			break;
		}
	});
});