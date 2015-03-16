<html>
<head>
<style type="text/css">
.Header1 {
	text-align: center;
	font-size: 36px;
	font-weight: bold;
}
.property_address {
	font-weight: bold;
	font-size: 24px;
}
.title-tag {
	font-weight: bold;
	text-align: center;
	font-size: 36px;
}
.side_h2 {
	font-weight: bold;
	font-style: italic;
	font-size: 24px;
}
.side-h3 {
	font-weight: bold;
	font-size: 18px;
}
.notes {
	text-align: center;
	font-style: italic;
}
.number-bullet {
	font-weight: bold;
	font-size: 18px;
}
.sub-bullet {
	text-align: center;
	font-style: italic;
}
</style>
</head>

<body>
<table width="100%" border="0">
  <tr>
    <td colspan="2" class="Header1">Tenancy Agreement</td>
    <td width="21%"><img src="http://rent-direct.co.uk/assets/img/logo-footer.png" alt="Rent Direct" name="Rent_Direct_Logo" width="282" height="51" id="Rent_Direct_Logo" align="right" /></td>
  </tr>
  <tr>
    <td colspan="2" class="property_address">Property: <?=$property_address?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">If either party does not understand this agreement, or anything contained within, he or she is strongly advise to ask an independent person for a more detailed explanation. Such information could be obtained from a solicitor, Citizens Advice Bureau or a housing advice centre.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="title-tag">The Agreement</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="side_h2">Particulars</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="14%" class="side-h3">Date:</td>
    <td width="65%"><?=$tenancy_agreement_date?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="side-h3">Parties:</td>
    <td class="side_h2">The Landlords Details</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><?=$landlord_name?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="side_h2">The Tenants Details</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><p><?=$tenant_1_name?>
        <br />
            <?
        if ($has_additional_tenant) {
            echo($additional_tenant_name);
        }
        ?>
    </p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="side-h3">Property:</td>
    <td><?=$address?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="side-h3">Term:</td>
    <td>A fixed term of <?=$term?> starting from <?=$tenancy_start_date?> until the <?=$tenancy_end_date?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">The landlord and the tenant agree that if either party wishes to terminate this agreement on or after <?=$tenancy_end_date?>, notice shall be given not less than <?=$tenancy_notice_period?> in writing to that effect. Upon expiry of notice, the agreement shall end. This does not affect any outstanding obligations to either party such as final payments, utility payments and other.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="side-h3">Rental Amount::</td>
    <td><?=$rent?> <?=$rent_type?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="side-h3">Payment terms:</td>
    <td>In advance, in equal payments made on the <?=$rent_payment_date?> of each month</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="side-h3">Payment Start date:</td>
    <td>To be made on the <?=$rent_payment_start_date?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="side-h3">Deposit:</td>
    <td><?=$deposit?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">It is a legal requirement that the deposit be placed in a government approved deposit protection scheme. Rent Direct has arranged for easy filing of the deposit with (the dps company). Both parties will receive their unique codes and access information, direct from (the dps company).</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="Header1">Terms &amp; Conditions</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="side_h2">Interpretation</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">1</td>
    <td>Where the context permits:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">1.1</td>
    <td>expressions defined in the particulars have the meanings shown.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">1.2</td>
    <td>'The Lanlord' includes the successors in title to the original landlord</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">1.3</td>
    <td>'The Tenant' includes the successors in title to the original tenant</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">1.4</td>
    <td>'The Property' includes any part of the Property (Including any rights specified in the particulars of the landlord's items)</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">1.5</td>
    <td>If there is more than one person described as the Tenant, the obligations of the Tenant apply to all those people together and seperate. Meaning, that each tenant is responsible for paying the whole of the rental amount, and meeting the financial or other obligations under the agreement.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="side_h2">Grant of Tenancy</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">2</td>
    <td>The landlord agrees to let the afore mentioned property to the tenant for the term specified, at the rent specified as set out in the Particulars</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">3</td>
    <td>This agreement creates an Assured Shorthold Tenancy within Part 1, Chapter 11 of the Housing Act 1988. This means that when the term expires, the landlord can recover possession as set out in section 21 of that Act unless the landlord gives the tenant a notice under paragraph 2 of Schedule 2A of that act, stating that the tenancy is no longer an Assured Shorthold Tenancy.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">4</td>
    <td>The propety is let in the condition shown in the schedule of condition signed by both parties</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">5</td>
    <td>If during the tenancy, the property is damaged to such an extent that the tenant cannot reside in it, the rent will cease to be payable until the property is repaired or rebuilt to a standard that allows it to be inhabitable. Unless:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">5.1</td>
    <td>The cause of said damage is something which the tenant did, or failed to do as a result of which the landlords insurance policy relating to the property is made void, and</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">5.2 </td>
    <td>the landlord gave the tenant notice of what the policy required.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="notes">Any dispute must be submitted to arbitration under Part I of the Arbitration Act 1996, if both parties agree to that in writing after the dispute has arisen.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="side_h2">Tenant's Obligations</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6</td>
    <td>The tenant agrees with the landlord to:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.1</td>
    <td>Pay the stated rental amount</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.2</td>
    <td>To pay interest on any rent or other payments lawfully due under this agreemen that is not recieved by the landlord within 7 days after the due payment date., at the rate of 4.5% per annum above the base lending rate of Barclays Bank Plc. This interest is payable from the date on which the rent or other payment fell due, up to the date of actual payment, whether before or after any court judgement.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.3 </td>
    <td>Pay and indemnify the landlord against all liability for any costs, fees, charges, disbursements and expenses reasonably incurred by the landlord in connection with or in consequence of:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="sub-bullet">a</td>
    <td>Any aplication for the landlord's consent (Whether r not the consent is given or the application is withdrawn) where consent is required under this agreement.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="sub-bullet">b</td>
    <td>recovery of arrears in rent or other sums due under this agreement;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="sub-bullet">c</td>
    <td>the enforcement of any covenant or obligation of the tenant under this agreement;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="sub-bullet">d</td>
    <td>putting an end to a nuisance which the tenant failed to stop.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.4</td>
    <td>As soon as practible after signing this agreement to notify:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="sub-bullet">a</td>
    <td>the council tax department of the local council of the tenant's liability to pay council tax in respect of the property from the commencement of the tenancy</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="sub-bullet">b</td>
    <td>The supplies of utility and other services to the property (including but not limited to gas, electricity, water, sewerage, telephone, internet, satellite) of the tenant's liability to pay for such services.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.5</td>
    <td class="side_h2">To pay:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="sub-bullet">a</td>
    <td>any council tax which the tenant is obliged to pay under the Local Government Finance Act 1992 or any regulations under that act</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="sub-bullet">b</td>
    <td>to the landlord, the amount of any council tax which, while the tenancy continues, the landlord becomes obliged to pay under that act or those regulations for any part of the period of the tenancy because the tenant ceases to live at the property.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.6</td>
    <td>To pay for all gas, electricity, water and sewerage services supplied to the property during the tenancy and to pay all charges for the use of any telephone at the property during said tenancy. Where necessary, the sums demanded by the service provider will be apportioned according to the duration of the tenancy. The sums covered by this clause including standing charges or other similar charges and VAT as well as charges for actual consumption.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.7</td>
    <td>To pay for the cost of recommecting gas, electric, water or sewerage services to the property that have been disconnected by reason of the tenant's failure to pay.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.8</td>
    <td>As a condition of entering into this agreement, you shall:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="sub-bullet">a</td>
    <td>obtain and maintain a policy of insurance with a ruptable insurance company to provide not less than £2,500 of cover for accidental damage to the property, fixtures and fittings and possessions; and</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="sub-bullet">b</td>
    <td>upon request, provide the landlord with proof of said insurance to evidence your compliance with this condition.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.9</td>
    <td>Not to damage, tamper or otherwise interfere in any way with any of the utility installations serving the property.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.10</td>
    <td>Not to install, or permit to be installed, a key or prepayment meter for the provision of gas, electric or water services to the property without the prior written consent of the landlord.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.11</td>
    <td>Not to change the supplier of any utility services to the property without prior written consent of the landlord, such consent not to be unreasonably witheld or delayed.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.13</td>
    <td>Not to overload the electrical circuits at the property.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.14</td>
    <td>Subject to clause 10 of this agreement, to keep drains, gutters and pipes of the property clear and not to dispose of any harmful or noxious materials (Such as oil, grease or corrosive substances) through the drains of the property. This obligation means that the tenancy is of a dwelling-house for a term less than seven year and section 11 of the Landlord and Tenancy Act 1985 (Referred to in clause 10 of this agreement) applies. The landlord commits to undertake any clearance work required in order to keep the drains, gutters and pipes in general good repair, but does not have to do small jobs where it is reasonable to presume the tenant would do.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.15</td>
    <td><p>In periods of exceptionally cold weather, to take all reasonable steps to prevent weather damage to the property or to the pipes, fixtures and fittings at the property.</p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.16</td>
    <td>To be responsbile for the emptying, at appropriate intervals, any septic tanks r cesspits serving the property</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.17</td>
    <td>To keep the interior of the proeprty, internal decorations and the landlord's items in good repair and condition (Except for damage caused by accidental fire and except for anything which the landlord is liabel to repair under this agreement or by law) and to replace if necessary any of the landlord's items which have been damaged or destroyed. This clause does not oblige the tenant to put the property into better repair than it was at the beginning of the tenancy.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.18</td>
    <td>Not to alter the external appearance of the property or to make significant changes to the internal decorative appearance of the property without the prior written consent of the landlord, such consent not to be unreasonably witheld or delayed.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.19</td>
    <td>To remedy any disrepair at the property for which the tenant is liable and which the landlord has requested the tenant to remedy within four weeks of receiving the request or within such other period is agreed with the landlord.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.20</td>
    <td>To maintain adequate heating and ventilation at the property so as to prevent damage to the property and the landlord's items caused by condensation, mould and dampness; and where condensation might occur to ensure that the interior surfaces in the property are kept wiped down and clean.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.21</td>
    <td>Not to affix or hang on the walls or other interior surfaces of the property any posters, pictures, photographs or similar items except by means of commerically made picture hooks or similar; and at the end of the tenancy to make good any damage or markes left as a result of any items so affixed.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.22</td>
    <td>To keep chimneys and fireplaces at the property well swept at regular intervals and to keep receipts or invoices as evidence of such actions having ben undertaken.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.23</td>
    <td>To clean the interior and exterior of windows where necessary.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.24</td>
    <td>To replace broken glass windows at the property as soon as reasonably practible.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.25</td>
    <td>To replace light bulbs, flourescent tubes, and fuses at the property whenever they need replacing.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.26</td>
    <td>To ensure that all smoke and carbon monoxide alarms at the property are in good working order at all times, and in the event of failure of such devices to notify the landlord as soon as reasonably praticable.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.27</td>
    <td>To notify the landlord as soon as resaonably practicable of any defect, damage or disrepair of the property which the landlord is obliged to remedy and not to remedy or attempt to remedy it except in cases of emergency, or where there is immediate danger to human health.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.28 </td>
    <td>If the landlord has given 48 hours written notice beforehand, to allow the landlord or their approved authority to enter the property at reasonable times of the day to inspect its condition and state of repair and to carry out repairs which are necessary by virtue of the landlord's responsibilities under this agreement or by law, or which are required to any adjoining property and can only be carried out by having access to the property.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="side_h2">Use Of Property</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.29</td>
    <td>To use the property as a private dwelling-house only, unless with prior written consent from the landlord. This means that the tenant must not carry on any profession, trade or business at the property and must not allow anyone else to do so.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.30</td>
    <td>Not to use the property for any illegal or immoral purpose or activity.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.31</td>
    <td>Not to alter or add to the property or do or allow anyone else to do anything on the property which the tenant might reasonably foresee would increase the risk of fire or endanger human health. This means in particular that the tenant must not bring or permit to be brought onto the property or keep at the property inflammable material or any gas appliances that have not been certified and connected by a suitably qualified gas safe registered engineer, but is not limited to those matters.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.32</td>
    <td>Not to do or allow anone else to do anything on the property which may be a nuisance to, or cause damage or annoyance to, the tenants or occupiers of any adjoing premises or which may adversely affect the energy efficiency rating or the enviromental impact rating of the property for the purposes of any energy performance certificate.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.33</td>
    <td>Not to do anything, or fail to comply with any requirment, as a result of which the policy of insurance taken out by the landlord (referred to further in clause 9(3) of this agreement) may be invalidated partly or altogether or by which the rate of premium on the policy may be increased.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.34</td>
    <td>To take all reasonable steps to prevent infestation to the property by vermin, rodents, fleas, moths or other pests; and where infestation occurs as a reult of the tenant's failure to take such reasonable steps, to be liable for the costs of fumigation or cleanign services that are required.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="side_h2">Garden &amp; Exterior</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.35</td>
    <td>To maintain the garden in a neat and tidy condition. This includes but is not limited to cutting the grass regularly, keeping paths, patios and flower beds free of weeds and generally keep the garden cultivated as at the beginning of the tenancy.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.36</td>
    <td>Not to dig up, cut down or cause damage to any trees, shrubs, or bushes without the landlords prior consent.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.37</td>
    <td>Not to place on or affix to the property any aerial, satellite dish, notice, board or advertising hoarding without the prior written consent of the landlord; and where such consent is given to pay for all reasonable costs of installation and removal; and the costs of making good any damage caused and any redecorations made necessary by the installation or removal.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.38</td>
    <td>Not to keep any commercial vehicle, caravan or boat at the property or in any communal parking space which the agreement gives the tenant the right to use without the prior written consent of the landlord.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.39</td>
    <td>Not to carry out repairs to cars, motorcycles, vans or other vehicles at the property or in any communal parking space, other than such maintenance of a motor vehicle as its registered keeper could reasonably be expected to carry out from time to time.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="side_h2">Security</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.40</td>
    <td>To give advance written notice to the landlord of any period during which the property will be continously unoccupied for more than 14 days and to comply with any reasonable requests by the landlord to ensure the safety and security of the property dfuring that period.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.41</td>
    <td>To ensure that the doors and windows of the Property are kept locked and secured and any burglar alarm is properly set while the Property is unoccupied.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.42</td>
    <td>Not to change the code or codes of any burglar alarm serving the Property without the prior written consent of the Landlord, such consent must not be unreasonably withheld or delayed; and where such consent is given, promptly to notify the Landlord in writing of the new code or codes.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.43</td>
    <td>Not to change, tamper with or otherwise damage any locks or bolts or other security devices at the Property without the prior written consent of the Landlord (except in cases of emergency), such consent not to be unreasonably withheld or delayed; and where any locks at the Property are changed, to provide the Landlord with keys to the new locks as soon as reasonably practicable.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="side_h2">Assignment, subletting and parting with possession</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.44</td>
    <td>Not to assign or sublet the Property and not to part with possession of it in any other way.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="notes">Note: The deﬁnition of “Property” means that this clause applies to dealings with any part of the Property as well as to dealings with the whole of it.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="side_h2">Notices from third parties</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.45</td>
    <td>To give the Landlord a copy of any notice given under the Party Wall etc. Act 1996, or any other formal or legal notice addressed to the owner of the Property or to the Landlord by name, within seven days of receiving it and not to do anything as a result of the notice unless required to do so by the Landlord.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="side_h2">The end of the tenancy</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.46</td>
    <td>To permit the Landlord to erect and display at the Property any for sale or to let board during the last three months of the tenancy.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.47</td>
    <td>During the last 28 days of the tenancy to allow the Landlord or the Landlord’s agents to enter and view the Property with prospective tenants at reasonable times of the day if the Landlord has given 24 hours’ written notice beforehand.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.48</td>
    <td>At the end of the Term or earlier if the tenancy comes to an end more quickly to leave the Property in the condition it should be in if the Tenant has performed the Tenant’s obligations under this Agreement. This means in particular that the Tenant must:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="sub-bullet">a</td>
    <td>remove from the Property all rubbish and refuse;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="sub-bullet">b</td>
    <td>remove from the Property all the Tenant’s belongings, personal effects and equipment, furnishings and foodstuffs;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="sub-bullet">c</td>
    <td>leave the Landlord’s Items at the end of the tenancy where they were at the beginning and not remove any of the Landlord’s Items from the Property;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="sub-bullet">d</td>
    <td>have professionally cleaned at the Tenant’s expense and to a reasonable standard any Landlord’s items which have become soiled, stained or marked during the tenancy.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="notes">This clause is not limited to a through d above</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">6.48</td>
    <td>At the Term or earlier if the tenancy comes to an end more quickly:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="sub-bullet">a</td>
    <td>to assist the Landlord in checking the Inventory and examining the condition of the Property;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="sub-bullet">b</td>
    <td>to return to the Landlord all keys to the Property (including any new keys cut during the tenancy);</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="sub-bullet">c</td>
    <td>to provide to the Landlord a forwarding address to facilitate communications between the parties about the return of the Deposit.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="side_h2">Breaches by the Tenant</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">7</td>
    <td>It is agreed that: If the Tenant -</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>is at least 14 days late in paying the Rent or any part of it, whether or not the Rent has been formally demanded, or has broken any of the terms of the Agreement</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>then, subject to the statutory provisions, the Landlord may recover possession of the Property and the tenancy will come to an end. Any other rights or remedies the Landlord may have will remain in force.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>If Tenant leaves personal possessions or effects at the Property after the end of the tenancy:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>where those possession or effects are unwieldy or bulky and would or might cause inconvenience to any future occupier of the Property the Landlord may, at the Tenant’s expense, upon giving the Tenant 14 days’ prior written notice, remove any such possessions and effects and arrange for their storage elsewhere; and if the Tenant has not made arrangements with the Landlord to recover possession of those items within three months of the end of the tenancy (including arrangements for payment of any reasonable storage charges if the Landlord so requires), the Landlord may sell or dispose of those items as the Landlord sees fit.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>the Landlord may, at the Tenant’s expense, upon giving the Tenant 14 days’ prior written notice, remove, sell or dispose of all other possessions or effects left at the Property as the Landlord sees fit.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="notes">Note: The Landlord cannot recover possession without an order of the court under the Housing Act 1988. Except in certain cases set out in the Act of substantial arrears of rent, the court has discretion whether or not to make an order and is likely to take account of whether unpaid rent has later been paid or a breach of terms of the tenancy has been made good.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="notes">Note: This clause does not affect the Tenant’s rights under the Protection from Eviction Act 1977.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="side_h2">Landlord's Obligations</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">The Landlord agrees with the Tenant -</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">That the Tenant has the right to possess and enjoy the Property during the tenancy without any lawful interruption from the Landlord or any person claiming through or in trust for the Landlord but:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">this clause does not limit any of the rights under this Agreement which the Tenant has agreed to allow the Landlord to exercise; and this clause does not prevent the Landlord from taking lawful steps to enforce the Landlord’s rights against the Tenant if the Tenant breaks any of the terms of this Agreement.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">8.2</td>
    <td>To pay all charges in respect of the Property except those which by the terms of this Agreement the Tenant has expressly agreed to pay and to pay to the Tenant the amount of any such charge which another person has compelled the Tenant to pay.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">8.3</td>
    <td>From the beginning of the Term until the tenancy ends:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="sub-bullet">a</td>
    <td>to effect and maintain, through reputable insurance underwriters and agents, a policy of insurance (but only so far as it is not invalidated by anything done or not done by the Tenant or anyone the Tenant has expressly or impliedly allowed on the Property) covering:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>the Property and the Landlord’s Items (but not the Tenant’s possessions and ﬁttings) for a sum sufficient to cover the cost of reinstatement assuming total loss including all applicable VAT and ancillary costs (such as site clearance and professional fees) and an appropriate allowance for inflation.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>the loss of all Rent and applicable VAT for the period which the Landlord from time to time reasonably considers sufficient to complete reinstatement of the Property following a total loss.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="sub-bullet">b</td>
    <td>upon reasonable request from time to time to produce to the Tenant a copy of the policy of insurance and evidence that it is in force.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">8.4</td>
    <td>To keep the outside of the Property (except the glass) and the ﬂoor, walls and structure of the Property in good repair and condition.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">8.5</td>
    <td>To ensure that all gas and electrical appliances at the Property are in safe and proper working order throughout the tenancy and to comply with all applicable gas and electricity safety legislation.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="notes">Note: Landlords must currently comply with Gas Safety (Installation and Use) Regulations 1998 (S.I. 1998 No. 2451), the Electrical Equipment (Safety) Regulations 1994 (S.I. 1994 No. 3260) and the Plugs and Sockets etc. (Safety) Regulations 1994 (S.I. 1994 No.1768).</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">8.6</td>
    <td>To keep in proper working order and regularly maintain any burglar alarm at the Property.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">8.7</td>
    <td>If the Landlord does not usually reside within the United Kingdom, to appoint an agent, whose residence and place of business is within the United Kingdom and to whom the Tenant will pay the Rent and any other sums due under this Agreement.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="side_h2">Landlords and Tenants Act 1985</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="number-bullet">9</td>
    <td>If section 11 of the Landlord and Tenant Act 1985 applies to the tenancy, the Tenant’s obligations are subject to the effect of that section.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="notes">Note: As a general rule, section 11 applies to tenancies of a dwelling-house for a term of less than seven years. It requires the landlord to keep in repair the structure and exterior of the dwelling-house including drains, gutters and external pipes; and to keep in repair and proper working order the installations for the supply of water, gas and electricity, for sanitation (including basins, sinks, baths and sanitary conveniences) and for space heating and heating water. The landlord is not obliged to repair until the tenant has given notice of the defect, and the tenant is obliged to take proper care of the Property and to do small jobs which a reasonable tenant would do.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="side_h2">Additional Clauses</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">The Landlord by this clause gives the Tenant notice under the Housing Act 1988 that possession may be recovered on the following grounds:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>The residential investment property was previously the landlord’s only or main home or the landlord or their spouse require it to live in as his or her main home.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>The residential investment property is subject to a mortgage which was granted before the tenancy started and the lender, usually a bank or building society, wants to sell it, normally to pay off mortgage arrears.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>The tenancy is for a ﬁxed term of not more than 12 months and at some time during the 12 months before the tenancy started, the property was let to students by an educational establishment such as a university or college.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>The landlord intends to substantially redevelop the residential investment property and cannot do so with the tenant there. This ground cannot be used where the landlord, or someone before him or her, brought the property with an existing tenant, or where the work could be carried out without the tenant having to move. The tenant’s removal expenses will have to be paid.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>The former tenant, who must have had a contractual periodic tenancy or statutory periodic tenancy, has died in the 12 months before possession proceedings started and there is no one living there who has a right to succeed to the tenancy.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>The tenant owed at least 2 months rent if the tenancy is on a monthly basis or 8 weeks rent if its is on a weekly basis, both when the landlord gave notice seeking possession and at the date of the court hearing.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="side_h2">Notice of Landlord's Address</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">The Landlord notiﬁes the Tenant that the Tenant may serve notices (including notices in proceedings) on the Landlord at the following address:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?=$landlords_address?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Any unpaid accounts for utilities or water charges or environmental services or other similar services or council tax incurred at the Property for which the Tenant is liable.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Any rent or other money due or payable by the Tenant under the tenancy agreement of which the Tenant has been made aware and which remains unpaid after the end of the tenancy.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="side_h2">At the end of the tenancy</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">The landlord must inform the Tenant in writing within 10 working days at the end of the tenancy if they propose to make any deductions from the Deposit.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">If there is no dispute the landlord will keep or repay the Deposit, according to the agreed deductions and the conditions of the tenancy agreement. Payment of the Deposit or any balance of it will be made within 10 working days of the Landlord and the Tenant agreeing the allocation of the Deposit.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">The Tenant shall try to inform the landlord in writing if the Tenant intends to dispute any of the deductions regarded by the Landlord or Agent as due from the Deposit within 20 working days after the termination or earlier ending of the tenancy and the Tenant vacating the Property.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">If there remains an unresolved dispute between the Landlord and Tenant after 10 working days after notiﬁcation of a dispute, the dispute may be submitted to the tenancy deposit scheme’s Independent Case Examiner.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">The statutory rights of the Landlord and the Tenant to take legal action through the county court remain unaffected by these provisions.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="side_h2">Contact details for tenants required by the deposit protection Scheme</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="side-h3">1st Tenants Name</td>
    <td><?=$tenant_1_name?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="side-h3">1st Tenants Email</td>
    <td><?=$tenant_1_email?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="side-h3">1st Tenants Telephone</td>
    <td><?=$tenant_1_phone?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?if($has_additional_tenant) {?>
  <tr>
    <td class="side-h3">2nd Tenants Name</td>
    <td><?=$additional_tenant_name?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="side-h3">2ndt Tenants Email</td>
    <td><?=$additional_tenant_email?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="side-h3">2nd Tenants Telephone</td>
    <td><?=$additional_tenant_phone?></td>
    <td>&nbsp;</td>
  </tr>
  <?}?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="side-h3">Deposit Amount</td>
    <td>&pound;<?=$deposit?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>The holder of the Deposit will register the Deposit with and provide other required information to the Tenancy Deposit Scheme within 30 days of the commencement of the tenancy or the taking of the Deposit whichever is earlier and provide proof to the Tenant of compliance. If the holder of the Deposit fails to provide proof within 30 days the Tenant should independent legal advice from a solicitor, Citizens Advice Bureau (CAB) or other housing advisory service.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>The Deposit will be released following the procedures set out in the clauses above.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Deductions may be made from the Deposit according to the clauses above.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>The Tenant conﬁrms that he / she has been given the opportunity to examine this information. The Tenant conﬁrms by signing this document that to the knowledge of the Tenant the information above is accurate to the best of his knowledge and belief.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="side-h3">Signed</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="side-h3">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="37" class="side-h3">Tenant 1</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="side-h3">Date</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="side-h3">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="39" class="side-h3">Tenant 2</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="side-h3">Date</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="side-h3">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="41" class="side-h3">Landlord</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="side-h3">Date</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
