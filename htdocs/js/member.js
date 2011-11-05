dojo.addOnLoad(function() {
	// our test data store for this example:
	storeMembers = new dojox.data.JsonRestStore( {
		target : "/API/members/",
		idAttribute : "id"
	});

	// set the layout structure:
	var layoutMembers = [ {
		field : 'id',
		name : 'ID',
		width : '30px'
	}, {
		field : 'last_name',
		name : 'Last Name',
		width : '100px'
	}, {
		field : 'first_name',
		name : 'First Name',
		width : 'auto'
	} ];

	// create a new grid:
	Member.gridMembers = new dojox.grid.DataGrid( {
		store : storeMembers,
		clientSort : true,
		rowSelector : '20px',
		structure : layoutMembers,
		selectionMode : 'single'
	}, document.createElement('div'));

	// append the new grid to the div "gridContainer4":
	dojo.byId("member_list").appendChild(Member.gridMembers.domNode);

	// Call startup, in order to render the grid:
	Member.gridMembers.startup();

	dojo.connect(Member.gridMembers, "onRowClick", null, function(e) {
		items = Member.gridMembers.selection.getSelected();
		person = items[0];
		Member.selection = person;
		Member.loadMain(person.id);
	});
});

Member = {};
Member.loadMain = function(id) {
	Member.memberAchievementStore = new dojox.data.JsonRestStore( {
		target : "/API/members/"+id+"/achievements",
		idAttribute : "id"
	});
	Member.activeMember = id;
	$.ajax( {
		url : "/ajax/person/details/" + id,
		success : function(data) {
			ajaxDigitPanel("membersMain", data);
			
			membersAchievements.setStore(Member.memberAchievementStore);
		}
	});
};
Member.dofeDlg = null;
Member.importDofEDialog = function() {
	$.ajax( {
		url : "ajax/import/DofE/form",
		success: function(data) {
			Member.dofeDlg = new dijit.Dialog({
		         title: "Import eDofE",
		         style: "width: 300px"
		     });
			Member.dofeDlg.attr("content", data);
			Member.dofeDlg.show();
		}
	});
};

Member.update = function() {
	storeMembers.revert();
};

Member.importDofE = function() {
	$.ajaxFileUpload
    (
        {
            url:'/ajax/import/DofE/upload', 
            secureuri:false,
            fileElementId:'dofe_upload',
            success: function (data)
            {
        		Member.dofeDlg.hide();
        		Member.update();
            },
            error: function (data, status, e)
            {
                alert(e);
        		Member.dofeDlg.hide();
        		Member.update();
            }
        }
    );
    
    return false; 
};
Member._timeout = null;
Member.setAttribute = function(field, value) {
	if (Member._timeout != null) {
		clearTimeout(Member._timeout);
	}
	storeMembers.setValue(Member.selection, field, value);
	Member._timeout = setTimeout("storeMembers.save(); Member._timeout = null;", 5000);
};

Member.addAchievementDialog = function() {
	$.ajax( {
		url : "/ajax/person/addAchievementDlg",
		success: function(data) {
			if (Member.achievementDlg != null) {
				Member.achievementDlg.destroyDescendants();
				Member.achievementDlg.destroy();
			}
			Member.achievementDlg = new dijit.Dialog({
		         title: "Add Achievement",
		         style: "width: 300px"
		     });
			Member.achievementDlg.attr("content", data);
			Member.achievementDlg.show();
			Member.achievementDlg.intermediateChanges = true;
			dojo.connect(dijit.byId("add_achievement_select"), "onChange", null, function(e) {
				if (dijit.byId("add_achievement_select").item.type == 2) {
					$("#member_add_achievement_value").css("display", "table-row");
				} else {
					$("#member_add_achievement_value").css("display", "none");
					
				}
			});
			
		}
	});
};

Member.addAchievement = function() {
	$.ajax( {
		url : "/ajax/person/addAchievement",
		type: "POST",
		data: "achievement="+encodeURIComponent(dijit.byId("add_achievement_select").value)+"&value="+encodeURIComponent(dijit.byId("add_achievement_value").value)+"&date="+encodeURIComponent(dijit.byId("add_achievement_date").value)+"&person="+encodeURIComponent(Member.activeMember)+"&comment="+encodeURIComponent(dijit.byId("add_achievement_comment").value),
		success: function(data) {
			Member.achievementDlg.hide();
			Member.memberAchievementStore.revert();
		}
	});
};

Member.removeAchievement = function() {
	selection = membersAchievements.selection.getSelected();
	if (selection.length > 0) {
		Member.memberAchievementStore.deleteItem(selection[0]);
	}
	Member.memberAchievementStore.save();
};