<input type="hidden" name="" id="member_id"
	value="<?php echo $id ?>" />
<table>
	<tr>
		<td><img
			src="<?php echo $person->picture_url? $person->picture_url : "http://img.onesocialworld.co.uk/person.png"; ?>" /></td>
		<td>
		<table>
			<tr>
				<td>First Name</td>
				<td><input dojoType="dijit.form.TextBox" type="text" name=""
					id="member_first_name" value="<?php echo $person->first_name ?>" /></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input dojoType="dijit.form.TextBox" type="text" name=""
					id="member_last_name" value="<?php echo $person->last_name ?>" /></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input dojoType="dijit.form.TextBox" type="text" name=""
					id="member_email" value="<?php echo $person->email ?>" /></td>
			</tr>
		</table>
		</td>
	</tr>
</table>
<table class="member_details_table">
	<tr>
		<td>
		<table>
			<tr>
				<td>House Name</td>
				<td><input dojoType="dijit.form.TextBox" type="text"
					name="house_name" id="member_house_name"
					value="<?php echo $person->house_name ?>" /></td>
			</tr>
			<tr>
				<td>House Number</td>
				<td><input dojoType="dijit.form.TextBox" type="text"
					name="house_number" id="member_house_number"
					value="<?php echo $person->house_number ?>" /></td>
			</tr>
			<tr>
				<td rowspan="3">Address</td>
				<td><input dojoType="dijit.form.TextBox" type="text"
					name="address_2" id="member_address_2"
					value="<?php echo $person->address_2 ?>" /></td>
			</tr>
			<tr>
				<td><input dojoType="dijit.form.TextBox" type="text"
					name="address_3" id="member_address_3"
					value="<?php echo $person->address_3 ?>" /></td>
			</tr>
			<tr>
				<td><input dojoType="dijit.form.TextBox" type="text"
					name="address_4" id="member_address_4"
					value="<?php echo $person->address_4 ?>" /></td>
			</tr>
		</table>
		</td>
		<td>
		<table>
			<tr>
				<td>County</td>
				<td><input dojoType="dijit.form.TextBox" type="text" name="county"
					id="member_county" value="<?php echo $person->county ?>" /></td>
			</tr>
			<tr>
				<td>Country</td>
				<td><input dojoType="dijit.form.TextBox" type="text" name="country"
					id="member_country" value="<?php echo $person->country ?>" /></td>
			</tr>
			<tr>
				<td>Postcode</td>
				<td><input dojoType="dijit.form.TextBox" type="text"
					name="postal_code" id="member_postal_code"
					intermediateChanges="true"
					value="<?php echo $person->postal_code ?>" /></td>
			</tr>
		</table>
		</td>
		<td>
		<table>

			<tr>
				<td>Telephone</td>
				<td><input dojoType="dijit.form.TextBox" type="text" name=""
					id="member_telephone" value="<?php echo $person->telephone ?>" /></td>
			</tr>
			<tr>
				<td>Mobile Telephone</td>
				<td><input dojoType="dijit.form.TextBox" type="text" name=""
					id="member_mobile_telephone"
					value="<?php echo $person->mobile_telephone ?>" /></td>
			</tr>
			<tr>
				<td>Date of Birth</td>
				<td><input dojoType="dijit.form.TextBox" type="text" name=""
					id="member_dob" value="<?php echo date("d/m/Y", $person->dob) ?>" /></td>
			</tr>
		</table>
		</td>
	</tr>
</table>
<div dojoType="dijit.layout.TabContainer" id="personDetailsTab"
	style="height: 300px;">
<div dojoType="dijit.layout.ContentPane" title="Achievements"
	id="personAchievementTab" selected="true">
<div class="person_achievement_actions">
<button dojoType="dijit.form.Button"><script type="dojo/method" data-dojo-event="onClick" data-dojo-args="evt">
        Member.removeAchievement();
    </script>Remove Achievement</button>
<button dojoType="dijit.form.Button">
	<script type="dojo/method" data-dojo-event="onClick" data-dojo-args="evt">
        Member.addAchievementDialog();
    </script>Add Achievement</button>
</div>
<div>
<table dojoType="dojox.grid.DataGrid" selectionMode="single" jsId="membersAchievements" style="height: 150px; width: 100%;">
	<thead>
		<tr>
			<th field="achievement_name" width="300px">Achievement Name</th>
			<th field="value" width="80px">Progress</th>
			<th field="date" width="100px">Date</th>
			<th field="awarder_name" width="150px">Issuing User</th>
			<th field="comment" width="auto">Comment</th>
		</tr>
	</thead>
</table>
</div></div>
<div dojoType="dijit.layout.ContentPane" title="Emergency Contact"
	id="personEmergencyTab">
	<div class="person_emcontact_actions">
		<button dojoType="dijit.form.Button"><script type="dojo/method" data-dojo-event="onClick" data-dojo-args="evt">
        Member.removeEmergencyContact();
    </script>Remove Contact</button>
		<button dojoType="dijit.form.Button">
			<script type="dojo/method" data-dojo-event="onClick" data-dojo-args="evt">
        Member.addEmergencyContactDialog();
    </script>Add Contact</button>
		</div>


	<table dojoType="dojox.grid.DataGrid" selectionMode="single" jsId="membersEmergency" style="height: 150px;">
		 
		<thead>
			<tr>
				<th field="full_name" width="200px">Name</th>
				<th field="telephone" width="100px">Home Phone</th>
				<th field="mobile_telephone" width="100px">Mobile Phone</th>
				<th field="full_address" width="300px">Address</th>
				<th field="email" width="200px">Email</th>
			</tr>
		</thead>
	</table>
	</div>


</div>