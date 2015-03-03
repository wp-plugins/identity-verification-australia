<?php
if(count($table_fields)>0){
?>
<form action="" method="post">
<table style="width:75% !important">
	
	<tr>
		<td class="title">
		First Name	<span class="required">*</span>	</td>
		<td>
			
			<input name="first_name" placeholder="First Name" type="text"  id="first_name"> <br/>
			<span class="err_fname err"></span>
		</td>
	</tr>
	<tr>
		<td class="title">
		Family Name	<span class="required">*</span>	</td>
		<td>
			<input name="last_name" placeholder="Family Name" type="text"  id="last_name"> <br/>
			<span class="err_lname err"></span>
		</td>
	</tr>
	<tr>
		<td class="title">
		Date Of Birth	<span class="required">*</span>	</td>
		<td>
			<input name="date_of_birth" id="dob" placeholder="Date Of Birth" type="text"   id="dob" > 
			<span class="err_dob err"></span>

		</td>
	</tr>
	<tr>
		<td class="title">
		Country	 <span class="required">*</span>	</td>
		<td>
			<select name="country"  id="country">
				<option value=""> Select Country </option>
				<option value="australia" selected="selected"> Australia </option>
			</select> 
			<br/>
			<span class="err_country err"></span>
		</td>
	</tr>
	<tr>
		<td class="title">
		Identity Type	<span class="required">*</span>	</td>
		<td>
			<input type="hidden" name="client_id" value="<?php echo $table_fields[0]->client_id?>" >
			<input type="hidden" name="client_secret" value="<?php echo $table_fields[0]->client_secret?>" >
			<input type="hidden" name="redirect_url" value="<?php echo $table_fields[0]->redirect_url?>" >
			<input type="hidden" name="error_url" value="<?php echo $table_fields[0]->error_url?>" >
			<input name="identity_type"  type="radio" value="driver_license" checked  id="dl_btn" class="identity_type">  Driver Licence <input name="identity_type" id="p_button" value="passport" type="radio" required class="identity_type">  Passport	
		</td>
	</tr>
</table>

	<table class="dl_info" style="width:75% !important"> 
		<tr>
			<td class="title">
			Driver Licence Number	<span class="required">*</span>	</td>
			<td>
				<input name="driver_license_number" id="driving_license" placeholder="Driver Licence Number" type="text" > <br/>
				<span class="err_dl err"></span>
			</td>
		</tr>
		<tr>
			<td class="title">
			Driver Licence State	<span class="required">*</span>	</td>
			<td>
				<select name="driver_license_state" id="dl_state">
					<option value="">Select State</option>
					<option value="ACT">Australian Capital Teritory</option>
					<option value="NSW">New South Wales</option>
					
					<option value="QLD">Queensland</option>
					<option value="SA">South Australia</option>
					
					<option value="VIC">Victoria</option>
					<option value="WA">Western Australia</option>
				</select>
				
				<span class="err_dl_state err"></span>
			</td>
		</tr>
		<tr style="display:none" class="state_dl">
			<td class="title">
			Rta Card Number	</td>
			<td>
				<input name="rta_card_number" id="rta" placeholder="Rta Card Number" type="text"> 
			</td>
		</tr>
		<tr style="display:none" class="doe_dl">
			<td class="title">
			Date Of Expiry	</td>
			<td>
				<input name="date_of_expiry" placeholder="Date Of Expiry" type="text" id="doe" > 
			</td>
		</tr>
		<tr>
			
			<td colspan=2 align="right">				<input  type="submit" value="Verify" class="btn"> 
			</td>
		</tr>
	</table>


	<table  class="passport_info" style="display:none;width:75% !important">
		<tr>
			<td class="title">
			Passport Number	<span class="required">*</span>	</td>
			<td>
				<input name="passport_number" id="p_no" placeholder="Passport Number" type="text" > <br/>
				<span class="err_p_no err"></span>
			</td>
		</tr>
		<tr>
			<td class="title">
			Place of Birth	<span class="required">*</span>	</td>
			<td>
				<input name="passport_placeof_birth" id="pob" placeholder="Place of Birth" type="text" > <br/>
				<span class="err_pob err"></span>
			</td>
		</tr>
		<tr>
			<td class="title">
				Country of Birth  <span class="required">*</span>
			</td>
			<td>
				<select id="passport_birth_country" name="passport_birth_country_name"  class="valid">
					<option value="">Country of Birth</option>
					<option value="SAO TOME &amp;amp; PRINCIPE">SAO TOME &amp;amp; PRINCIPE</option>
					<option value="SAUDI ARABIA">SAUDI ARABIA</option>
					<option value="SERBIA AND MONTENEGRO*">SERBIA AND MONTENEGRO*</option>
					<option value="SEYCHELLES">SEYCHELLES</option>
					<option value="SIERRA LEONE">SIERRA LEONE</option>
					<option value="SINGAPORE">SINGAPORE</option>
					<option value="SLOVAKIA">SLOVAKIA</option>
					<option value="SLOVENIA">SLOVENIA</option>
					<option value="SOLOMON ISLANDS">SOLOMON ISLANDS</option>
					<option value="SOMALIA">SOMALIA</option>
					<option value="SOUTH AFRICA">SOUTH AFRICA</option>
					<option value="SOUTHERN RHODESIA*">SOUTHERN RHODESIA*</option>
					<option value="SPAIN">SPAIN</option>
					<option value="SRI LANKA">SRI LANKA</option>
					<option value="SUDAN">SUDAN</option>
					<option value="SURINAME">SURINAME</option>
					<option value="SVALBARD AND JAN MAYEN">SVALBARD AND JAN MAYEN</option>
					<option value="SWAZILAND">SWAZILAND</option>
					<option value="SWEDEN">SWEDEN</option>
					<option value="SWITZERLAND">SWITZERLAND</option>
					<option value="SYRIA">SYRIA</option>
					<option value="TAIWAN">TAIWAN</option>
					<option value="TAJIKISTAN">TAJIKISTAN</option>
					<option value="TANGANYIKA*">TANGANYIKA*</option>
					<option value="TANZANIA">TANZANIA</option>
					<option value="THAILAND">THAILAND</option>
					<option value="TIMOR LESTE (FORMERLY EAST TIMOR)">TIMOR LESTE (FORMERLY EAST TIMOR)</option>
					<option value="TOGO">TOGO</option>
					<option value="TOKELAU">TOKELAU</option>
					<option value="TONGA">TONGA</option>
					<option value="TRINIDAD &amp;amp; TOBAGO">TRINIDAD &amp;amp; TOBAGO</option>
					<option value="TUNISIA">TUNISIA</option>
					<option value="TURKEY">TURKEY</option>
					<option value="TURKMENISTAN">TURKMENISTAN</option>
					<option value="TURKS &amp;amp; CAICOS ISLANDS">TURKS &amp;amp; CAICOS ISLANDS</option>
					<option value="TUVALU">TUVALU</option>
					<option value="U.S.S.R.*">U.S.S.R.*</option>
					<option value="UGANDA">UGANDA</option>
					<option value="UKRAINE">UKRAINE</option>
					<option value="UNITED ARAB EMIRATES">UNITED ARAB EMIRATES</option>
					<option value="UNITED KINGDOM">UNITED KINGDOM</option>
					<option value="URUGUAY">URUGUAY</option>
					<option value="USA">USA</option>
					<option value="UZBEKISTAN">UZBEKISTAN</option>
					<option value="VANUATU">VANUATU</option>
					<option value="VATICAN CITY STATE (HOLY SEE)">VATICAN CITY STATE (HOLY SEE)</option>
					<option value="VENEZUELA">VENEZUELA</option>
					<option value="VIETNAM">VIETNAM</option>
					<option value="VIRGIN ISLANDS (USA)">VIRGIN ISLANDS (USA)</option>
					<option value="WESTERN SAHARA">WESTERN SAHARA</option>
					<option value="WESTERN SAMOA*">WESTERN SAMOA*</option>
					<option value="YEMEN">YEMEN</option>
					<option value="YUGOSLAVIA*">YUGOSLAVIA*</option>
					<option value="ZAIRE">ZAIRE</option>
					<option value="ZAMBIA">ZAMBIA</option>
					<option value="ZANZIBAR*">ZANZIBAR*</option>
					<option value="ZIMBABWE">ZIMBABWE</option>
					<option value="AUSTRALIA">AUSTRALIA</option>
					<option value="AFGHANISTAN">AFGHANISTAN</option>
					<option value="ALAND ISLANDS">ALAND ISLANDS</option>
					<option value="ALBANIA">ALBANIA</option>
					<option value="ALGERIA">ALGERIA</option>
					<option value="AMERICAN SAMOA">AMERICAN SAMOA</option>
					<option value="ANDORRA">ANDORRA</option>
					<option value="ANGOLA">ANGOLA</option>
					<option value="ANGUILLA">ANGUILLA</option>
					<option value="ANTARCTICA">ANTARCTICA</option>
					<option value="ANTIGUA AND BARBUDA">ANTIGUA AND BARBUDA</option>
					<option value="ARGENTINA">ARGENTINA</option>
					<option value="ARMENIA">ARMENIA</option>
					<option value="ARUBA">ARUBA</option>
					<option value="AUSTRIA">AUSTRIA</option>
					<option value="AZERBAIJAN">AZERBAIJAN</option>
					<option value="BAHAMAS">BAHAMAS</option>
					<option value="BAHRAIN">BAHRAIN</option>
					<option value="BANGLADESH">BANGLADESH</option>
					<option value="BARBADOS">BARBADOS</option>
					<option value="BECHUANALAND">BECHUANALAND</option>
					<option value="BELARUS">BELARUS</option>
					<option value="BELGIUM">BELGIUM</option>
					<option value="BELIZE">BELIZE</option>
					<option value="BENIN">BENIN</option>
					<option value="BERMUDA">BERMUDA</option>
					<option value="BHUTAN">BHUTAN</option>
					<option value="BOLIVIA">BOLIVIA</option>
					<option value="BOSNIA AND HERZEGOVINA">BOSNIA AND HERZEGOVINA</option>
					<option value="BOTSWANA">BOTSWANA</option>
					<option value="BOUVET ISLAND">BOUVET ISLAND</option>
					<option value="BRAZIL">BRAZIL</option>
					<option value="BRITISH INDIAN OCEAN TERRITITORY">BRITISH INDIAN OCEAN TERRITITORY</option>
					<option value="BRUNEI">BRUNEI</option>
					<option value="BULGARIA">BULGARIA</option>
					<option value="BURKINA FASO">BURKINA FASO</option>
					<option value="BURMA">BURMA</option>
					<option value="BURUNDI">BURUNDI</option>
					<option value="BYELORUSSIA">BYELORUSSIA</option>
					<option value="CAMBODIA">CAMBODIA</option>
					<option value="CAMEROON">CAMEROON</option>
					<option value="CANADA">CANADA</option>
					<option value="CAPE VERDE">CAPE VERDE</option>
					<option value="CAYMAN ISLANDS">CAYMAN ISLANDS</option>
					<option value="CENTRAL AFRICAN REPUBLIC">CENTRAL AFRICAN REPUBLIC</option>
					<option value="CHAD">CHAD</option>
					<option value="CHILE">CHILE</option>
					<option value="CHINA">CHINA</option>
					<option value="CHRISTMAS ISLAND">CHRISTMAS ISLAND</option>
					<option value="COCOS KEELING ISLANDS">COCOS KEELING ISLANDS</option>
					<option value="COLOMBIA">COLOMBIA</option>
					<option value="COMOROS">COMOROS</option>
					<option value="CONGO">CONGO</option>
					<option value="CONGO (DEMOCRATIC REPUBLIC OF THE)">CONGO (DEMOCRATIC REPUBLIC OF THE)</option>
					<option value="COOK ISLANDS">COOK ISLANDS</option>
					<option value="COSTA RICA">COSTA RICA</option>
					<option value="CROATIA">CROATIA</option>
					<option value="CUBA">CUBA</option>
					<option value="CYPRUS">CYPRUS</option>
					<option value="CZECH REPUBLIC">CZECH REPUBLIC</option>
					<option value="CZECHOSLOVAKIA*">CZECHOSLOVAKIA*</option>
					<option value="DAHOMEY*">DAHOMEY*</option>
					<option value="DENMARK">DENMARK</option>
					<option value="DJIBOUTI">DJIBOUTI</option>
					<option value="DOMINICA">DOMINICA</option>
					<option value="DOMINICAN REPUBLIC">DOMINICAN REPUBLIC</option>
					<option value="EAST PAKISTAN*">EAST PAKISTAN*</option>
					<option value="ECUADOR">ECUADOR</option>
					<option value="EGYPT">EGYPT</option>
					<option value="EL SALVADOR">EL SALVADOR</option>
					<option value="EQUATORIAL GUINEA">EQUATORIAL GUINEA</option>
					<option value="ERITREA">ERITREA</option>
					<option value="ESTONIA">ESTONIA</option>
					<option value="ETHIOPIA">ETHIOPIA</option>
					<option value="FALKLAND ISLANDS (MALVINAS)">FALKLAND ISLANDS (MALVINAS)</option>
					<option value="FAROE ISLANDS">FAROE ISLANDS</option>
					<option value="FIJI">FIJI</option>
					<option value="FINLAND">FINLAND</option>
					<option value="FRANCE">FRANCE</option>
					<option value="FRENCH ALGERIA*">FRENCH ALGERIA*</option>
					<option value="FRENCH GUIANA">FRENCH GUIANA</option>
					<option value="FRENCH POLYNESIA">FRENCH POLYNESIA</option>
					<option value="FRENCH SOUTHERN TERRITORIES">FRENCH SOUTHERN TERRITORIES</option>
					<option value="FRENCH TERRITORY OF AFARS AND ISSAS*">FRENCH TERRITORY OF AFARS AND ISSAS*</option>
					<option value="GABON">GABON</option>
					<option value="GAMBIA">GAMBIA</option>
					<option value="GEORGIA">GEORGIA</option>
					<option value="GERMAN EAST AFRICA*">GERMAN EAST AFRICA*</option>
					<option value="GERMANY (DEMOCRATIC REPUBLIC OF)*">GERMANY (DEMOCRATIC REPUBLIC OF)*</option>
					<option value="GERMANY (FEDERAL REPUBLIC OF)">GERMANY (FEDERAL REPUBLIC OF)</option>
					<option value="GHANA">GHANA</option>
					<option value="GIBRALTAR">GIBRALTAR</option>
					<option value="GREECE">GREECE</option>
					<option value="GREENLAND">GREENLAND</option>
					<option value="GRENADA">GRENADA</option>
					<option value="GUADELOUPE">GUADELOUPE</option>
					<option value="GUAM">GUAM</option>
					<option value="GUATEMALA">GUATEMALA</option>
					<option value="GUERNSEY">GUERNSEY</option>
					<option value="GUINEA">GUINEA</option>
					<option value="GUINEA BISSAU">GUINEA BISSAU</option>
					<option value="GUYANA">GUYANA</option>
					<option value="HAITI">HAITI</option>
					<option value="HEARD AND MCDONALD ISLANDS">HEARD AND MCDONALD ISLANDS</option>
					<option value="HONDURAS">HONDURAS</option>
					<option value="HONG KONG SAR">HONG KONG SAR</option>
					<option value="HUNGARY">HUNGARY</option>
					<option value="ICELAND">ICELAND</option>
					<option value="INDIA">INDIA</option>
					<option value="INDONESIA">INDONESIA</option>
					<option value="IRAN">IRAN</option>
					<option value="IRAQ">IRAQ</option>
					<option value="IRELAND">IRELAND</option>
					<option value="ISLE OF MAN">ISLE OF MAN</option>
					<option value="ISRAEL">ISRAEL</option>
					<option value="ITALY">ITALY</option>
					<option value="IVORY COAST">IVORY COAST</option>
					<option value="JAMAICA">JAMAICA</option>
					<option value="JAPAN">JAPAN</option>
					<option value="JERSEY">JERSEY</option>
					<option value="JORDAN">JORDAN</option>
					<option value="KANTON AND ENDERBURY ISLANDS*">KANTON AND ENDERBURY ISLANDS*</option>
					<option value="KAZAKHSTAN">KAZAKHSTAN</option>
					<option value="KENYA">KENYA</option>
					<option value="KIRIBATI">KIRIBATI</option>
					<option value="KOREA, NORTH">KOREA, NORTH</option>
					<option value="KOREA, SOUTH">KOREA, SOUTH</option>
					<option value="KOSOVO">KOSOVO</option>
					<option value="KUWAIT">KUWAIT</option>
					<option value="KYRGYZSTAN">KYRGYZSTAN</option>
					<option value="LAOS">LAOS</option>
					<option value="LATVIA">LATVIA</option>
					<option value="LEBANON">LEBANON</option>
					<option value="LESOTHO">LESOTHO</option>
					<option value="LIBERIA">LIBERIA</option>
					<option value="LIBYA">LIBYA</option>
					<option value="LIECHTENSTEIN">LIECHTENSTEIN</option>
					<option value="LITHUANIA">LITHUANIA</option>
					<option value="LUXEMBOURG">LUXEMBOURG</option>
					<option value="MACAU SAR">MACAU SAR</option>
					<option value="MACEDONIA, FORMER YUGOSLAV REPUBLIC OF">MACEDONIA, FORMER YUGOSLAV REPUBLIC OF</option>
					<option value="MADAGASCAR">MADAGASCAR</option>
					<option value="MALAWI">MALAWI</option>
					<option value="MALAYSIA">MALAYSIA</option>
					<option value="MALDIVES">MALDIVES</option>
					<option value="MALI">MALI</option>
					<option value="MALTA">MALTA</option>
					<option value="MARSHALL ISLANDS">MARSHALL ISLANDS</option>
					<option value="MARTINIQUE">MARTINIQUE</option>
					<option value="MAURITANIA">MAURITANIA</option>
					<option value="MAURITIUS">MAURITIUS</option>
					<option value="MAYOTTE">MAYOTTE</option>
					<option value="MEXICO">MEXICO</option>
					<option value="MICRONESIA">MICRONESIA</option>
					<option value="MOLDOVA">MOLDOVA</option>
					<option value="MONACO">MONACO</option>
					<option value="MONGOLIA">MONGOLIA</option>
					<option value="MONTENEGRO">MONTENEGRO</option>
					<option value="MONTSERRAT">MONTSERRAT</option>
					<option value="MOROCCO">MOROCCO</option>
					<option value="MOZAMBIQUE">MOZAMBIQUE</option>
					<option value="MYANMAR">MYANMAR</option>
					<option value="NAMIBIA">NAMIBIA</option>
					<option value="NAURU">NAURU</option>
					<option value="NEPAL">NEPAL</option>
					<option value="NETHERLANDS">NETHERLANDS</option>
					<option value="NETHERLANDS ANTILLES">NETHERLANDS ANTILLES</option>
					<option value="NEUTRAL ZONE">NEUTRAL ZONE</option>
					<option value="NEW CALEDONIA">NEW CALEDONIA</option>
					<option value="NEW ZEALAND">NEW ZEALAND</option>
					<option value="NICARAGUA">NICARAGUA</option>
					<option value="NIGER">NIGER</option>
					<option value="NIGERIA">NIGERIA</option>
					<option value="NIUE">NIUE</option>
					<option value="NORFOLK ISLAND">NORFOLK ISLAND</option>
					<option value="NORTHERN MARIANA ISLANDS">NORTHERN MARIANA ISLANDS</option>
					<option value="NORWAY">NORWAY</option>
					<option value="OMAN">OMAN</option>
					<option value="PAKISTAN">PAKISTAN</option>
					<option value="PALAU">PALAU</option>
					<option value="PALESTINIAN TERRITORIES*">PALESTINIAN TERRITORIES*</option>
					<option value="PANAMA">PANAMA</option>
					<option value="PAPUA NEW GUINEA">PAPUA NEW GUINEA</option>
					<option value="PARAGUAY">PARAGUAY</option>
					<option value="PERU">PERU</option>
					<option value="PHILIPPINES">PHILIPPINES</option>
					<option value="PITCAIRN">PITCAIRN</option>
					<option value="POLAND">POLAND</option>
					<option value="PORTUGAL">PORTUGAL</option>
					<option value="PUERTO RICO">PUERTO RICO</option>
					<option value="QATAR">QATAR</option>
					<option value="REUNION">REUNION</option>
					<option value="RHODESIA*">RHODESIA*</option>
					<option value="ROMANIA">ROMANIA</option>
					<option value="RUSSIA">RUSSIA</option>
					<option value="RWANDA">RWANDA</option>
					<option value="SAINT BARTHELEMY">SAINT BARTHELEMY</option>
					<option value="SAINT HELENA">SAINT HELENA</option>
					<option value="SAINT KITTS AND NEVIS">SAINT KITTS AND NEVIS</option>
					<option value="SAINT LUCIA">SAINT LUCIA</option>
					<option value="SAINT MARTIN">SAINT MARTIN</option>
					<option value="SAINT PIERRE AND MIQUECON">SAINT PIERRE AND MIQUECON</option>
					<option value="SAINT VINCENT AND GRENADINES">SAINT VINCENT AND GRENADINES</option>
					<option value="SAMOA">SAMOA</option>
					<option value="SAN MARINO">SAN MARINO</option>
					<option value="SENEGAL">SENEGAL</option>
					<option value="SERBIA">SERBIA</option>
					<option value="SOUTH GEORGIA AND SOUTH SANDWICH ISLANDS">SOUTH GEORGIA AND SOUTH SANDWICH ISLANDS</option>
					<option value="UNITED STATES MINOR OUTLYING ISLANDS">UNITED STATES MINOR OUTLYING ISLANDS</option>
					<option value="VIRGIN ISLANDS (BRITISH)">VIRGIN ISLANDS (BRITISH)</option>
					<option value="WALLIS AND FUTUNA ISLANDS">WALLIS AND FUTUNA ISLANDS</option>
					<option value="YEMEN (DEMOCRATIC PEOPLES' REPUBLIC)*">YEMEN (DEMOCRATIC PEOPLES' REPUBLIC)*</option>
				</select>
				<span class="err_p_pbc err"></span>
			</td>
		</tr>
		<tr>
			<td class="title">
			Family Name at Birth  <span class="required">*</span>	</td>
			<td>
				<input name="surname_atbirth" id="p_sab" placeholder="Family Name at Birth" type="text" id="doe"> 
				<span class="err_p_sab err"></span>
			</td>
		</tr>
		<tr>
			<td class="title">
			Name at Citizenship  <span class="required">*</span>	</td>
			<td>
				<input name="firstname_atcitizenship" id="p_fac" placeholder="Name at Citizenship " type="text" id="doe"> <br/>
				<span class="err_p_fac err"></span>
			</td>
		</tr>
		<tr>
			<td class="title">
			Family Name at Citizenship  <span class="required">*</span>	</td>
			<td>
				<input name="surname_atcitizenship" id="p_sac" placeholder="Family Name at Citizenship" type="text" id="doe">
				<span class="err_p_sac err"></span> 
			</td>
		</tr>
		<tr>
			
			<td colspan=2 align="right">
				<input  type="submit" value="Verify" class="btn"> 
			</td>
		</tr>
	</table>


</form>
	
 

<?php
}else{

echo "API Credentials Not Yet Configured";
	}
  ?>

