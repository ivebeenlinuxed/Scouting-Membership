<table>
			<tr>
				<td>First Name</td>
				<td><input dojoType="dijit.form.TextBox" type="text" name=""
					id="em_con_first_name" value="" /></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input dojoType="dijit.form.TextBox" type="text" name=""
					id="em_con_last_name" value="" /></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input dojoType="dijit.form.TextBox" type="text" name=""
					id="em_con_email" value="" /></td>
			</tr>
		</table>
<table class="em_con_details_table">
	<tr>
		<td>
		<table>
			<tr>
				<td>House Name</td>
				<td><input dojoType="dijit.form.TextBox" type="text"
					name="house_name" id="em_con_house_name"
					value="" /></td>
			</tr>
			<tr>
				<td>House Number</td>
				<td><input dojoType="dijit.form.TextBox" type="text"
					name="house_number" id="em_con_house_number"
					value="" /></td>
			</tr>
			<tr>
				<td rowspan="3">Address</td>
				<td><input dojoType="dijit.form.TextBox" type="text"
					name="address_2" id="em_con_address_2"
					value="" /></td>
			</tr>
			<tr>
				<td><input dojoType="dijit.form.TextBox" type="text"
					name="address_3" id="em_con_address_3"
					value="" /></td>
			</tr>
			<tr>
				<td><input dojoType="dijit.form.TextBox" type="text"
					name="address_4" id="em_con_address_4"
					value="" /></td>
			</tr>
		</table>
		</td>
		<td>
		<table>
			<tr>
				<td>County</td>
				<td><input dojoType="dijit.form.TextBox" type="text" name="county"
					id="em_con_county" value="" /></td>
			</tr>
			<tr>
				<td>Country</td>
				<td><input dojoType="dijit.form.TextBox" type="text" name="country"
					id="em_con_country" value="" /></td>
			</tr>
			<tr>
				<td>Postcode</td>
				<td><input dojoType="dijit.form.TextBox" type="text"
					name="" id="em_con_postal_code"
					intermediateChanges="true"
					value="" /></td>
			</tr>
		</table>
		</td>
		<td>
		<table>

			<tr>
				<td>Telephone</td>
				<td><input dojoType="dijit.form.TextBox" type="text" name=""
					id="em_con_telephone" value="" /></td>
			</tr>
			<tr>
				<td>Mobile Telephone</td>
				<td><input dojoType="dijit.form.TextBox" type="text" name=""
					id="em_con_mobile_telephone"
					value="" /></td>
			</tr>
		</table>
		</td>
	</tr>
</table>
<button dojoType="dijit.form.Button"><script type="dojo/method"
	data-dojo-event="onClick" data-dojo-args="evt">
        Member.addEmergencyContact();
    </script>Add Contact</button>