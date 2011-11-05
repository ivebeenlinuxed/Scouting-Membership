<table>
	<tr>
		<td>Achievement</td>
		<td><input dojoType="dijit.form.FilteringSelect" value=""
			store="Achievement.store" searchAttr="name"
			id="add_achievement_select" /></td>
	</tr>
	<tr id="member_add_achievement_value" style="display: none;">
		<td>Value</td>
		<td><input dojoType="dijit.form.ValidationTextBox" placeholder="0"
			regExp="^\d+$" id="add_achievement_value"
			invalidMessage="Must be a number" /></td>
	</tr>
	<tr>
		<td>Date</td>
		<td><input id="add_achievement_date" type="text"
			name="add_achievement_date" dojoType="dijit.form.DateTextBox"
			required="true" /></td>
	</tr>
	<tr>
		<td>Comment</td>
		<td><input id="add_achievement_comment" type="text"
			name="add_achievement_comment" dojoType="dijit.form.TextBox" /></td>
	</tr>
</table>
<button dojoType="dijit.form.Button"><script type="dojo/method"
	data-dojo-event="onClick" data-dojo-args="evt">
        Member.addAchievement();
    </script>Award Achievement</button>
