<?php
/**
 * Internationalization file for EditAccount extension.
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author Łukasz Garczewski (TOR) <tor@wikia-inc.com>
 */
$messages['en'] = array(
	'editaccount' => 'Edit account',
	'editaccount-desc' => 'Enables staff members to manage user account information',
	'editaccount-title' => 'Special:EditAccount',
	'editaccount-frame-manage' => 'Edit an account',
	'editaccount-frame-usage' => 'Note',
	'editaccount-usage' => "User data is cached separately for each wiki. When you reset a password or email, cache will be busted for this wiki only. Please direct the user to this wiki to log in with a newly set password to avoid cache issues.",
	'editaccount-label-select' => 'Select a user account',
	'editaccount-submit-account' => 'Manage account',
	'editaccount-frame-account' => 'Editing user account: $1',
	'editaccount-frame-close' => 'Disable user account: $1',
	'editaccount-label-email' => 'Set new email address',
	'editaccount-label-pass' => 'Set new password',
	'editaccount-label-realname' => 'Set new real name',
	'editaccount-label-clearunsub' => 'Unsubscribed',
	'editaccount-submit-email' => 'Save and confirm email address',
	'editaccount-submit-pass' => 'Save password',
	'editaccount-submit-realname' => 'Save real name',
	'editaccount-submit-clearunsub' => 'Clear unsubscribe',
	'editaccount-submit-cleardisable' => 'Clear disable flag',
	'editaccount-submit-close' => 'Close account',
	'editaccount-usage-close' => 'You can also disable a user account by scrambling its password and removing the e-mail address. Note that this data is lost and will not be recoverable.',
	'editaccount-warning-close' => '<b>Caution!</b> You are about to permanently disable the account of user <b>$1</b>. This cannot be reverted. Are you sure that is what you want to do?',
	'editaccount-status' => 'Status message',
	'editaccount-success-email' => 'Successfully changed email address for account $1 to $2.',
	'editaccount-success-email-blank' => 'Successfully removed email address for account $1.',
	'editaccount-success-pass' => 'Successfully changed password for account $1.',
	'editaccount-success-realname' => 'Successfully changed real name for account $1.',
	'editaccount-success-unsub' => 'Successfully removed unsubscribe bit for account $1.',
	'editaccount-success-disable' => 'Successfully removed disabled bit for account $1.',
	'editaccount-success-close' => 'Successfully disabled account $1.',
	'editaccount-error-email' => 'Email was not changed. Try again or contact the Tech Team.',
	'editaccount-error-pass' => 'Password was not changed. Try again or contact the Tech Team.',
	'editaccount-error-realname' => 'Real name was not changed. Try again or contact the Tech Team.',
	'editaccount-error-close' => 'A problem occured when closing account. Try again or contact the Tech Team.',
	'editaccount-invalid-email' => '"$1" is not a valid email address!',
	'editaccount-nouser' => 'Account "$1" does not exist!',
	'editaccount-remove-avatar-fail' => 'Problem auto-removing avatar.',
	'editaccount-requested' => 'Note: User has requested an account closure',
	'editaccount-not-requested' => 'CAUTION: User has not requested an account closure',
	'editaccount-labal-account-status' => 'Account Status',
	'editaccount-labal-email-status' => 'Email Status',
	'editaccount-status-confirmed' => 'Confirmed',
	'editaccount-status-unconfirmed' => 'Unconfirmed',
	'editaccount-status-realuser' => 'Real User',
	'editaccount-status-tempuser' => 'Temp User',
	'editaccount-error-tempuser-email' => 'Temp users cannot have blank email address field, please enter an email address.',
	'editaccount-email-change-requested' => 'User requested email change via Preferences to $1. To confirm the requested email address change for the user, enter the requested email address into the field below and click "Save and confirm."',
	
	# logging
	'editaccount-log' => 'User accounts log',
	'editaccount-log-header' => 'This page lists changes made to user information by Wikia Staff.',
	'editaccount-log-entry-email' => 'changed e-mail for user $2',
	'editaccount-log-entry-pass' => 'changed password for user $2',
	'editaccount-log-entry-realname' => 'changed real name for user $2',
	'editaccount-log-entry-close' => 'disabled account $2',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;">This account has been disabled globally by Wikia.</div>',
	// For Special:ListGroupRights
	'right-editaccount' => "Edit other users' information",
);

/** Message documentation (Message documentation)
 * @author Lloffiwr
 * @author Siebrand
 * @author The Evil IP address
 * @author Umherirrender
 */
$messages['qqq'] = array(
	'editaccount-desc' => '{{desc}}',
	'editaccount-success-disable' => 'Parameters:
* $1 is a username.',
	'editaccount-status-realuser' => 'This is the status of the account in the Wikia UserLogin system – a "real user" means an active account, while a "temp user" means it\'s an inactive account. Accounts are activated once the user clicks on a link in an e-mail we send them.

Per [[Thread:Support/About_Wikia:Editaccount-status-realuser/ms_and_Wikia:Editaccount-status-tempuser/ms/reply|user TOR on support]]',
	'editaccount-status-tempuser' => 'This is the status of the account in the Wikia UserLogin system – a "real user" means an active account, while a "temp user" means it\'s an inactive account. Accounts are activated once the user clicks on a link in an e-mail we send them.',
	'right-editaccount' => '{{doc-right|editaccount}}',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'editaccount' => 'Wysig gebruiker',
	'editaccount-frame-manage' => "Wysig 'n rekening",
	'editaccount-frame-usage' => 'Let op',
	'editaccount-label-select' => "Kies 'n gebruiker",
	'editaccount-submit-account' => 'Bestuur gebruiker',
	'editaccount-frame-close' => 'Deaktiveer gebruiker: $1',
	'editaccount-label-email' => 'Stel nuwe e-posadres',
	'editaccount-label-pass' => 'Stel nuwe wagwoord',
	'editaccount-label-realname' => 'Stel nuwe regte naam',
	'editaccount-submit-email' => 'Stoor E-pos',
	'editaccount-submit-pass' => 'Stoor wagwoord',
	'editaccount-submit-realname' => 'Stoor regte naam',
	'editaccount-submit-close' => 'Sluit rekening',
	'editaccount-status' => 'Statusboodskap',
	'editaccount-invalid-email' => '"$1" is nie \'n geldige e-posadres nie!',
	'editaccount-nouser' => 'Die gebruiker "$1" bestaan nie.',
);

/** Arabic (العربية)
 * @author ترجمان05
 */
$messages['ar'] = array(
	'editaccount' => 'عدّل الحساب',
	'editaccount-title' => 'خاص:EditAccount',
	'editaccount-label-select' => 'حدّد حساب مستخدم',
	'editaccount-frame-account' => 'تعديل حساب المستخدم: $1',
	'editaccount-log-entry-close' => 'الحساب معطّل $2',
);

/** Azerbaijani (Azərbaycanca)
 * @author Cekli829
 */
$messages['az'] = array(
	'editaccount-frame-usage' => 'Qeyd',
	'editaccount-submit-email' => 'E-məktub ünvanını qeyd et',
	'editaccount-submit-pass' => 'Parolu qeyd et',
	'editaccount-submit-realname' => 'Əsl adı qeyd et',
);

/** Belarusian (Taraškievica orthography) (‪Беларуская (тарашкевіца)‬)
 * @author EugeneZelenko
 */
$messages['be-tarask'] = array(
	'editaccount-submit-email' => 'Захаваць адрас электроннай пошты',
	'editaccount-submit-pass' => 'Захаваць пароль',
	'editaccount-submit-realname' => 'Захаваць сапраўднае імя',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'editaccount-submit-pass' => 'Съхраняване на паролата',
	'editaccount-invalid-email' => '"$1" не е валиден адрес за електронна поща!',
	'right-editaccount' => 'Редактиране на настройките на други потребители',
);

/** Bihari (भोजपुरी)
 * @author Ganesh
 */
$messages['bh'] = array(
	'editaccount' => 'खाता सम्पादन',
	'editaccount-title' => 'विशेष: खाता सम्पादन',
);

/** Bhojpuri (भोजपुरी) */
$messages['bho'] = array(
	'editaccount' => 'खाता सम्पादन',
	'editaccount-title' => 'विशेष: खाता सम्पादन',
);

/** Breton (Brezhoneg)
 * @author Fulup
 * @author Gwenn-Ael
 * @author Y-M D
 */
$messages['br'] = array(
	'editaccount' => 'Kemmañ ar gont',
	'editaccount-desc' => "Talvezout a ra d'ar skipailh merañ d'ober war-dro titouroù ar c'hontoù implijer",
	'editaccount-title' => 'Special:EditAccount',
	'editaccount-frame-manage' => 'Kemmañ ur gont',
	'editaccount-frame-usage' => 'Notenn',
	'editaccount-usage' => "Kuzhet e vez roadennoù an implijerien a-unanoù evit pep wiki. Ma teraouekait ar ger-tremen pe ar chomlec'h postel en-dro ne vo nullet ar grubuilh nemet evit ar wiki-mañ. Kasit, mar plij, an implijer war-du ar wiki-se evit ma c'hallo kevreañ ouzh e c'her-tremen nevez evit ma ne vefe ket a gudennoù krubuilh.",
	'editaccount-label-select' => 'Dibab ur gont implijer',
	'editaccount-submit-account' => 'Merañ ar gont',
	'editaccount-frame-account' => 'Kemmoù ar gont implijer : $1',
	'editaccount-frame-close' => 'Diweredekaat ar gont implijer : $1',
	'editaccount-label-email' => "Termeniñ ur chomlec'h postel nevez",
	'editaccount-label-pass' => 'Termeniñ ur ger-tremen nevez',
	'editaccount-label-realname' => 'Termeniñ un anv klok nevez',
	'editaccount-label-clearunsub' => 'Digoumanantet',
	'editaccount-submit-email' => 'Enrollañ ar postel',
	'editaccount-submit-pass' => 'Enrollañ ar ger-tremen',
	'editaccount-submit-realname' => 'Enrollañ an anv klok',
	'editaccount-submit-clearunsub' => 'Diverkañ an digoumanantiñ',
	'editaccount-submit-close' => 'Serriñ ar gont',
	'editaccount-usage-close' => "Gallout a rit ivez diweredekaat ur gont implijer en ur rinegiñ he ger-tremen hag en ur implijout he chomlec'h postel. Diwallit ! Kollet e vo ar roadennoù ha ne c'hallor ket adtapout anezho.",
	'editaccount-warning-close' => "<b>Diwallit !</b> Emaoc'h war-nes diweredekaat ar gont implijer <b>$1</b> da vat. Ne c'hallor ket en dizober. Ha c'hoant ho peus d'en ober ?",
	'editaccount-status' => 'Kemenadenn statud',
	'editaccount-success-email' => 'Kemmet eo bet ar postel evit ar gont $1 da $2.',
	'editaccount-success-email-blank' => "Dilamet mat eo bet chomlec'h postel ar gont $1.",
	'editaccount-success-pass' => 'Kemmet eo bet ger-tremen ar gont $1.',
	'editaccount-success-realname' => 'Kemmet eo bet anv gwir ar gont $1.',
	'editaccount-success-unsub' => 'Tennet kuit eo bet an titour digoumanantiñ evit ar gont $1.',
	'editaccount-success-close' => 'Diweredekaet eo bet ar gont $1.',
	'editaccount-error-email' => "N'eo ket bet kemmet ar chomlec'h postel. Klaskit adarre pe kit a darempred gant ar skipailh teknikel.",
	'editaccount-error-pass' => "N'eo ket bet kemmet ar ger-tremen. Klaskit adarre pe kit a darempred gant ar skipailh teknikel.",
	'editaccount-error-realname' => "N'eo ket bet kemmet an anv gwir. Klaskit adarre pe kit a darempred gant ar skipailh teknikel.",
	'editaccount-error-close' => 'Ur gudenn a zo bet pa vezer o serriñ ar gont. Klaskit adarre pe kit a darempred gant ar skipailh teknikel.',
	'editaccount-invalid-email' => 'N\'eo ket "$1" ur chomlec\'h postel reizh !',
	'editaccount-nouser' => 'N\'eus ket eus ar gont "$1" !',
	'editaccount-log' => "Marilh ar c'hontoù implijer",
	'editaccount-log-header' => "Rollet e vez er pajenn-mañ ar c'hemmoù graet gant staff Wikia er penndibaboù implijer.",
	'editaccount-log-entry-email' => "en deus kemmet chmolec'h postel an implijer $2",
	'editaccount-log-entry-pass' => 'en deus kemmet ger-tremen ar gont $2',
	'editaccount-log-entry-realname' => 'en deus kemmet anv gwir ar gont $2',
	'editaccount-log-entry-close' => 'en deus diweredekaet ar gont $2',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;">Diweredekaet eo bet ar gont-mañ en un doare hollek gant Wikia.</div>',
	'right-editaccount' => 'Kemmañ penndibaboù implijerien all',
);

/** Catalan (Català)
 * @author Davidpar
 */
$messages['ca'] = array(
	'editaccount-log-entry-pass' => "contrasenya canviada de l'usuari $2",
	'editaccount-log-entry-realname' => "canviat el nom real de l'usuari $2",
	'editaccount-log-entry-close' => 'compte desactivat $2',
	'edit-account-closed-flag' => '<div style="border: 1px solid black; padding: 1em">Aquest compte ha estat desactivat.</div>',
	'right-editaccount' => 'Edita les preferències dels altres usuaris',
);

/** Czech (Česky)
 * @author Darth Daron
 * @author Dontlietome7
 */
$messages['cs'] = array(
	'editaccount' => 'Upravit účet',
	'editaccount-desc' => 'Umožňuje zaměstnancům spravovat informace v uživatelských účtech',
	'editaccount-title' => 'Special:EditAccount',
	'editaccount-frame-manage' => 'Upravit účet',
	'editaccount-frame-usage' => 'Poznámka',
	'editaccount-usage' => 'Uživatelská data jsou uložena do mezipaměti samostatně pro každou wiki. Při obnovení hesla nebo e-mailu bude mezipaměť smazána jen pro tuto wiki. Sdělte uživateli této wiki, aby se přihlašoval pomocí nově nastaveného hesla k zamezení problémů s mezipamětí.',
	'editaccount-label-select' => 'Vyberte uživatelský účet',
	'editaccount-submit-account' => 'Sprqvovat účet',
	'editaccount-frame-account' => 'Editace uživatelského účtu: $1',
	'editaccount-frame-close' => 'Zakázání uživatelského účtu: $1',
	'editaccount-label-email' => 'Nastavit novou e-mailovou adresu',
	'editaccount-label-pass' => 'Nastavit nové heslo',
	'editaccount-label-realname' => 'Nastavit novoé skutečné jméno',
	'editaccount-label-clearunsub' => 'Odhlášeno',
	'editaccount-submit-email' => 'Uložit e-mailovou adresu',
	'editaccount-submit-pass' => 'Uložit heslo',
	'editaccount-submit-realname' => 'Uložit skutečné jméno',
	'editaccount-submit-clearunsub' => 'Pročistit odhlášené',
	'editaccount-submit-cleardisable' => 'Pročistit zakázané vlajky',
	'editaccount-submit-close' => 'Zavřít účet',
	'editaccount-usage-close' => 'Uživatelský účet můžete také zakázat vytvořením náhodného hesla a odebíráním e-mailové adresy. Data však budou nevratně ztracena.',
	'editaccount-warning-close' => '<b>Pozor!</b> Chystáte se trvale zakázat účet uživatele <b>$1</b>. To nelze vrátit. Jste si jisti, že to chcete udělat?',
	'editaccount-status' => 'Zpráva o stavu',
	'editaccount-success-email' => 'Úspěšně změněna e-mailová adresa pro účet $1 na $2.',
	'editaccount-success-email-blank' => 'Úspěšně odstraněna e-mailová adresa účtu $1.',
	'editaccount-success-pass' => 'Úspěšně změněno heslo účtu $1.',
	'editaccount-success-realname' => 'Úspěšně změnil skutečné jméno pro účet $1.',
	'editaccount-success-unsub' => 'Odhlašený bit pro účet $1 úspěšně odebrán.',
	'editaccount-success-disable' => 'Zakázaný bit pro účet $1 úspěšně odebrán.',
	'editaccount-success-close' => 'Úspěšně zakázan účet $1.',
	'editaccount-error-email' => 'E-mail nebyl změněn. Zkuste to znovu nebo kontaktujte technický tým.',
	'editaccount-error-pass' => 'Heslo nebylo změněno. Zkuste to znovu nebo kontaktujte technický tým.',
	'editaccount-error-realname' => 'Skutečné jméno nebylo změněno. Zkuste to znovu nebo kontaktujte technický tým.',
	'editaccount-error-close' => 'Došlo k potížím při zavírání účtu. Zopakujte akci nebo se obraťte na technický tým.',
	'editaccount-invalid-email' => '"$1" není platná e-mailová adresa!',
	'editaccount-nouser' => 'Účet "$1" neexistuje!',
	'editaccount-remove-avatar-fail' => 'Problém při auto-odstraňování avataru.',
	'editaccount-requested' => 'Poznámka: Uživatel požadoval uzavření účtu.',
	'editaccount-not-requested' => 'Upozornění: Uživatel nepožadoval uzavření účtu.',
	'editaccount-labal-account-status' => 'Stav účtu',
	'editaccount-labal-email-status' => 'Stav e-mailu',
	'editaccount-status-confirmed' => 'Potvrzené',
	'editaccount-status-unconfirmed' => 'Nepotvrzené',
	'editaccount-status-realuser' => 'Skutečný uživatel',
	'editaccount-status-tempuser' => 'Dočasný uživatel',
	'editaccount-error-tempuser-email' => 'Dočasní uživatelé nemohou mít prázdné pole e-mailové adresy, zadejte prosím e-mailovou adresu.',
	'editaccount-email-change-requested' => 'Uživatel požaduje změnu e-mailu pomocí předvoleb na $1 . Chcete-li potvrdit změnu e-mailové adresu uživatele, zadejte požadovanou e-mailovou adresu do pole níže a klepněte na tlačítko "Uložit a potvrdit."',
	'editaccount-log' => 'Protokol uživatelských účtů',
	'editaccount-log-header' => 'Tato stránka obsahuje seznam změn provedených v uživatelských předvoleb zaměstnanci Wikia.',
	'editaccount-log-entry-email' => 'změněn e-mail uživatele $2',
	'editaccount-log-entry-pass' => 'změněno heslo uživatele $2',
	'editaccount-log-entry-realname' => 'změněno skutečné jméno uživatele $2',
	'editaccount-log-entry-close' => 'zakázán účet $2',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;">Tento účet byl Wikií globálně deaktivován.</div>',
	'right-editaccount' => 'Upravit předvolby ostatních uživatelů',
);

/** German (Deutsch)
 * @author Jan Luca
 * @author LWChris
 * @author Quedel
 * @author The Evil IP address
 * @author Tiin
 */
$messages['de'] = array(
	'editaccount' => 'Konto bearbeiten',
	'editaccount-desc' => 'Benutzerkonten-Verwaltung durch Mitarbeiter',
	'editaccount-title' => 'Special:EditAccount',
	'editaccount-frame-manage' => 'Ein Benutzerkonto bearbeiten',
	'editaccount-frame-usage' => 'Notiz',
	'editaccount-usage' => 'User-Daten werden separat für jedes Wiki gespeichert. Wenn du ein Passwort oder E-Mail-Adresse zurücksetzt, wird der Speicher nur für dieses Wiki gelöscht werden. Bitte schicke den Benutzer zu diesem Wiki zum Einzuloggen mit neuem Passwort, um Cache-Probleme zu vermeiden.',
	'editaccount-label-select' => 'Wähle ein Benutzerkonto',
	'editaccount-submit-account' => 'Konto verwalten',
	'editaccount-frame-account' => 'Bearbeiten von Benutzerkonto: $1',
	'editaccount-frame-close' => 'Deaktivieren von Benutzerkonto: $1',
	'editaccount-label-email' => 'Neue E-Mail-Adresse setzen',
	'editaccount-label-pass' => 'Neues Passwort setzen',
	'editaccount-label-realname' => 'Neuen tatsächlichen Namen setzen',
	'editaccount-label-clearunsub' => 'Abbestellt',
	'editaccount-submit-email' => 'E-Mail-Adresse speichern',
	'editaccount-submit-pass' => 'Passwort speichern',
	'editaccount-submit-realname' => 'Tatsächlichen Namen speichern',
	'editaccount-submit-clearunsub' => 'Abbestellen aufheben',
	'editaccount-submit-close' => 'Konto schließen',
	'editaccount-usage-close' => 'Du kannst ein Konto auch deaktivieren indem du das Passwort zerwürfelst und die E-Mail-Adresse löschst. Beachte, dass diese Daten verloren und nicht wiederherstellbar sind.',
	'editaccount-warning-close' => '<b>Achtung!</b> Du bist dabei, das Konto von Benutzer <b>$1</b> dauerhaft zu deaktivieren. Dies kann nicht rückgängig gemacht werden. Bist du sicher, dass du das tun möchtest?',
	'editaccount-status' => 'Statusmeldung',
	'editaccount-success-email' => 'E-Mail-Adresse für das Konto $1 erfolgreich in $2 geändert.',
	'editaccount-success-email-blank' => 'E-Mail-Adresse für Konto $1 erfolgreich entfernt.',
	'editaccount-success-pass' => 'Passwort für Konto $1 erfolgreich geändert.',
	'editaccount-success-realname' => 'Tatsächlicher name für Konto $1 erfolgreich geändert.',
	'editaccount-success-unsub' => 'Abbestellen-Bit für Konto $1 erfolgreich entfernt.',
	'editaccount-success-close' => 'Konto $1 erfolgreich deaktiviert.',
	'editaccount-error-email' => 'Die E-Mail-Adresse wurde nicht geändert. Versuche es erneut oder kontaktiere das Tech Team.',
	'editaccount-error-pass' => 'Das Passwort wurde nicht geändert. Versuche es erneut oder kontaktiere das Tech Team.',
	'editaccount-error-realname' => 'Der tatsächliche Name wurde nicht geändert. Versuche es erneut oder kontaktiere das Tech Team.',
	'editaccount-error-close' => 'Beim Schließen des Kontos trat ein Fehler auf. Versuche es erneut oder kontaktiere das Tech Team.',
	'editaccount-invalid-email' => '„$1“ ist keine gültige E-Mail-Adresse!',
	'editaccount-nouser' => 'Konto „$1“ existiert nicht!',
	'editaccount-remove-avatar-fail' => 'Problem beim automatischen Entfernen des Avatars.',
	'editaccount-requested' => 'Hinweis: Benutzer hat Kontoschließung beantragt',
	'editaccount-not-requested' => '!ACHTUNG: Benutzer hat noch keine Kontoschließung beantragt',
	'editaccount-log' => 'Benutzerkonten-Logbuch',
	'editaccount-log-header' => 'Diese Seite listet Änderungen von Benutzereinstellungen durch das Wikia Personal.',
	'editaccount-log-entry-email' => 'änderte die E-Mail-Adresse von Benutzer $2',
	'editaccount-log-entry-pass' => 'änderte das Passwort von Benutzer $2',
	'editaccount-log-entry-realname' => 'änderte den tatsächlichen Namen von Benutzer $2',
	'editaccount-log-entry-close' => 'deaktivierte das Konto $2',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;">Dieses Benutzerkonto wurde global von Wikia deaktiviert.</div>',
	'right-editaccount' => 'Bearbeite andere Benutzereinstellungen',
);

/** German (formal address) (‪Deutsch (Sie-Form)‬)
 * @author LWChris
 */
$messages['de-formal'] = array(
	'editaccount-usage' => 'User-Daten werden separat für jedes Wiki gespeichert. Wenn Sie ein Passwort oder E-Mail-Adresse zurücksetzen, wird der Speicher nur für dieses Wiki gelöscht werden. Bitte schicken Sie den Benutzer zu diesem Wiki zum Einzuloggen mit neuem Passwort, um Cache-Probleme zu vermeiden.',
	'editaccount-label-select' => 'Wählen Sie ein Benutzerkonto',
	'editaccount-usage-close' => 'Sie können ein Konto auch deaktivieren indem Sie das Passwort zerwürfeln und die E-Mail-Adresse löschen. Beachten Sie, dass diese Daten verloren und nicht wiederherstellbar sind.',
	'editaccount-warning-close' => '<b>Achtung!</b> Sie sind dabei, das Konto von Benutzer <b>$1</b> dauerhaft zu deaktivieren. Dies kann nicht rückgängig gemacht werden. Sind Sie sicher, dass Sie das tun möchten?',
	'editaccount-error-email' => 'Die E-Mail-Adresse wurde nicht geändert. Versuchen Sie es erneut oder kontaktieren Sie das Tech Team.',
	'editaccount-error-pass' => 'Das Passwort wurde nicht geändert. Versuchen Sie es erneut oder kontaktieren Sie das Tech Team.',
	'editaccount-error-realname' => 'Der tatsächliche Name wurde nicht geändert. Versuchen Sie es erneut oder kontaktieren Sie das Tech Team.',
	'editaccount-error-close' => 'Beim Schließen des Kontos trat ein Fehler auf. Versuchen Sie es erneut oder kontaktieren Sie das Tech Team.',
	'right-editaccount' => 'Bearbeiten Sie andere Benutzereinstellungen',
);

/** Greek (Ελληνικά)
 * @author Crazymadlover
 * @author Dada
 * @author Evropi
 */
$messages['el'] = array(
	'editaccount' => 'Επεξεργασία λογαριασμού',
	'editaccount-desc' => 'Επιτρέπει στα μέλη του προσωπικού να διαχειρίζονται τις πληροφορίες λογαριασμού χρήστη',
	'editaccount-frame-manage' => 'Επεξεργασία ενός λογαριασμού',
	'editaccount-frame-usage' => 'Σημείωμα',
	'editaccount-submit-account' => 'Διαχείριση λογαριασμού',
	'editaccount-frame-account' => 'Επεξεργασία λογαριασμού χρήστη: $1',
	'editaccount-frame-close' => 'Απενεργοποίηση λογαριασμού χρήστη: $1',
	'editaccount-label-email' => 'Ορισμός νέα διεύθυνσης ηλεκτρονικού ταχυδρομείου',
	'editaccount-label-pass' => 'Ορισμός νέου κωδικού πρόσβασης',
	'editaccount-label-realname' => 'Ορισμός νέου πραγματικού ονόματος',
	'editaccount-submit-email' => 'Αποθήκευση διεύθυνσης ηλεκτρονικού ταχυδρομείου',
	'editaccount-submit-pass' => 'Αποθήκευση κωδικού',
	'editaccount-submit-realname' => 'Αποθήκευση πραγματικού ονόματος',
	'editaccount-submit-close' => 'Κλείσιμο λογαριασμού',
	'editaccount-log-entry-pass' => 'Έγινε αλλαγή στον κωδικό πρόσβασης του χρήστη $2',
);

/** Spanish (Español)
 * @author Armando-Martin
 * @author Benfutbol10
 * @author Crazymadlover
 * @author Pertile
 * @author Translationista
 * @author VegaDark
 */
$messages['es'] = array(
	'editaccount' => 'Editar Cuenta',
	'editaccount-desc' => 'Permite a los miembros del staff gestionar información de cuenta de usuario',
	'editaccount-title' => 'Especial:EditAccount',
	'editaccount-frame-manage' => 'Editar una cuenta',
	'editaccount-frame-usage' => 'Nota',
	'editaccount-usage' => 'Los datos de usuario están en una memoria intermedia separada para cada wiki. Cuando se reinicie una contraseña o cuenta de correo electrónico, la memoria intermedia será únicamente anulada para esta wiki. Por favor dirija el usuario a esta wiki para acceder al sistema con una nueva contraseña y evitar problemas de memoria intermedia.',
	'editaccount-label-select' => 'Seleccionar una cuenta de usuario',
	'editaccount-submit-account' => 'Administrar Cuenta',
	'editaccount-frame-account' => 'Editando cuenta de usuario: $1',
	'editaccount-frame-close' => 'Desactivar la cuenta de usuario: $1',
	'editaccount-label-email' => 'Fijar una nueva dirección de correo electrónico',
	'editaccount-label-pass' => 'Fijar una nueva contraseña',
	'editaccount-label-realname' => 'Fijar un nuevo nombre real',
	'editaccount-label-clearunsub' => 'Desuscrito',
	'editaccount-submit-email' => 'Guardar correo electrónico',
	'editaccount-submit-pass' => 'Guardar contraseña',
	'editaccount-submit-realname' => 'Guardar nombre verdadero',
	'editaccount-submit-clearunsub' => 'Borrar desuscripción',
	'editaccount-submit-cleardisable' => 'Retirar la marca de desactivado',
	'editaccount-submit-close' => 'Cerrar cuenta',
	'editaccount-usage-close' => 'También puedes desactivar una cuenta de usuario desordenando su contraseña y eliminando la dirección de correo electrónico. Ten en cuenta que estos datos se perderán y no se podrán recuperar.',
	'editaccount-warning-close' => '<b>Atención:</b> Estás a punto de desactivar permanentemente la cuenta del usuario <b>$1</b>. Esta acción es irreversible. ¿Seguro que eso es lo que deseas?',
	'editaccount-status' => 'Mensaje de estado',
	'editaccount-success-email' => 'Se ha cambiado correctamente el correo electrónico de la cuenta de $1 a $2.',
	'editaccount-success-email-blank' => 'Se ha eliminado con éxito el correo electrónico de la cuenta de $1.',
	'editaccount-success-pass' => 'Se ha cambiado correctamente la contraseña de cuenta de $1.',
	'editaccount-success-realname' => 'Se ha cambiado correctamente el nombre real de la cuenta de $1.',
	'editaccount-success-unsub' => 'Eliminada correctamente la suscripción de la cuenta $1.',
	'editaccount-success-disable' => 'Se ha retirado la etiqueta "desactivada" para la cuenta $1 correctamente.',
	'editaccount-success-close' => 'Se ha inhabilitado correctamente la cuenta $1.',
	'editaccount-error-email' => 'El correo electrónico no se ha cambiado. Inténtalo de nuevo o contacta con el Equipo Técnico.',
	'editaccount-error-pass' => 'La clave ha sido cambiada. Inténtalo de nuevo o contacta con el Equipo Técnico.',
	'editaccount-error-realname' => 'El nombre real no se ha modificado. Inténtalo de nuevo o contacta con el Equipo Técnico.',
	'editaccount-error-close' => 'Ha ocurrido un problema mientras cerrabas la cuenta. Inténtalo de nuevo o contacta con el Equipo Técnico.',
	'editaccount-invalid-email' => '¡"$1" no es una dirección válida de correo electrónico!',
	'editaccount-nouser' => '¡La cuenta "$1" no existe!',
	'editaccount-remove-avatar-fail' => 'Problema durante la eliminación automática del avatar.',
	'editaccount-requested' => 'Nota: El usuario ha solicitado la clausura de una cuenta',
	'editaccount-not-requested' => 'AVISO: El usuario no ha solicitado la clausura de una cuenta',
	'editaccount-labal-account-status' => 'Estado de cuenta',
	'editaccount-labal-email-status' => 'Estado de correo electrónico',
	'editaccount-status-confirmed' => 'Confirmado',
	'editaccount-status-unconfirmed' => 'No confirmado',
	'editaccount-status-realuser' => 'Usuario real',
	'editaccount-status-tempuser' => 'Usuario temporal',
	'editaccount-error-tempuser-email' => 'Los usuarios temporales no pueden tener el campo de dirección de correo electrónico en blanco, escriba una dirección de correo electrónico.',
	'editaccount-email-change-requested' => 'Un usuario pidió cambio de correo electrónico a través de sus Preferencias en $1. Para confirmar el cambio de dirección de correo electrónico solicitado por el usuario, escriba la dirección de correo electrónico solicitada en el campo de más abajo y haga clic en "Guardar y confirmar".',
	'editaccount-log' => 'Registro de cuentas del usuario',
	'editaccount-log-header' => 'Esta página se enumera los cambios que el personal de Wikia ha realizado a las preferencias de usuario.',
	'editaccount-log-entry-email' => 'Se ha cambiado de correo electrónico del usuario $2',
	'editaccount-log-entry-pass' => 'Se ha cambiado la contraseña del usuario $2',
	'editaccount-log-entry-realname' => 'Se ha cambiado el nombre real del usuario $2',
	'editaccount-log-entry-close' => 'inhabilitado cuenta $2',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;">Esta cuenta ha sido deshabilitada globalmente en Wikia.</div>',
	'right-editaccount' => 'Editar las preferencias de otros usuarios',
);

/** Persian (فارسی)
 * @author BlueDevil
 * @author ZxxZxxZ
 */
$messages['fa'] = array(
	'editaccount' => 'ویرایش حساب کاربری',
	'editaccount-label-realname' => 'تعیین نام واقعی جدید',
	'editaccount-submit-close' => 'بستن حساب کاربری',
);

/** Finnish (Suomi)
 * @author Centerlink
 * @author Crt
 * @author Jack Phoenix <jack@countervandalism.net>
 * @author Nike
 * @author Tm T
 */
$messages['fi'] = array(
	'editaccount' => 'Muokkaa käyttäjätunnuksia',
	'editaccount-desc' => 'Henkilöstön jäsenet voivat hallita käyttäjätunnuksien tietoja.',
	'editaccount-title' => 'Special: EditAccount',
	'editaccount-frame-manage' => 'Muokkaa käyttäjätunnusta',
	'editaccount-frame-usage' => 'Huomioi',
	'editaccount-usage' => 'Käyttäjäkohtaisen tiedot ovat talletettuna välimuistiin erikseen jokaista wikiä kohden. Kun asetat uuden salasanan tai sähköpostiosoitteen, välimuistiin tallennetut tiedot poistetaan vain tämän wikin kohdalla. Ohjaa käyttäjä kirjautumaan sisään tätä wikiä käyttäen välttääksesi ongelmia välimuistin kanssa.',
	'editaccount-label-select' => 'Valitse käyttäjätunnus',
	'editaccount-submit-account' => 'Hallinnoi tunnusta',
	'editaccount-frame-account' => 'Muokataan käyttäjätunnusta: $1',
	'editaccount-frame-close' => 'Poista käytöstä käyttäjätunnus: $1',
	'editaccount-label-email' => 'Aseta uusi sähköpostiosoite',
	'editaccount-label-pass' => 'Aseta uusi salasana',
	'editaccount-label-realname' => 'Aseta uusi oikea nimi',
	'editaccount-label-clearunsub' => 'Tilaus lopetettu',
	'editaccount-submit-email' => 'Tallenna sähköpostiosoite',
	'editaccount-submit-pass' => 'Tallenna salasana',
	'editaccount-submit-realname' => 'Tallenna oikea nimi',
	'editaccount-submit-close' => 'Sulje tunnus',
	'editaccount-usage-close' => 'Käyttäjätunnuksen voi poistaa käytöstä myös sekoittamalla sen salasanan ja poistamalla sen sähköpostiosoitteen. Huomioi, että nämä tiedot katoavat eikä niitä voi palauttaa.',
	'editaccount-warning-close' => '<b>Varoitus!</b> Olet poistamassa pysyvästi käytöstä käyttäjän <b>$1</b> tilin. Tämä ei voi palauttaa. Oletko varma, että haluat tehdä tämän?',
	'editaccount-status' => 'Tilaviesti',
	'editaccount-success-email' => 'Tunnuksen $1 sähköpostiosoite vaihdettiin onnistuneesti osoitteeseen $2.',
	'editaccount-success-email-blank' => 'Tunnuksen $1 sähköpostiosoitteen poistaminen onnistui.',
	'editaccount-success-pass' => 'Tunnuksen $1 salasana vaihdettiin onnistuneesti.',
	'editaccount-success-realname' => 'Tilin $1 oikea nimi vaihdettiin onnistuneesti.',
	'editaccount-success-close' => 'Tunnus $1 poistettiin käytöstä onnistuneesti.',
	'editaccount-error-email' => 'Sähköpostiosoitetta ei vaihdettu. Yritä uudelleen tai ota yhteyttä tekniseen tiimiin.',
	'editaccount-error-pass' => 'Salasanaa ei vaihdettu. Yritä uudelleen tai ota yhteyttä tekniseen tiimiin.',
	'editaccount-error-realname' => 'Oikea nimi ei vaihtunut. Yritä uudelleen tai ota yhteys tekniseen ryhmään.',
	'editaccount-error-close' => 'Tunnusta suljettaessa tapahtui virhe. Yritä uudelleen tai ota yhteyttä tekniseen tiimiin.',
	'editaccount-invalid-email' => '"$1" ei ole kelvollinen sähköpostiosoite!',
	'editaccount-nouser' => 'Tunnusta nimeltä "$1" ei ole olemassa!',
	'editaccount-log' => 'Käyttäjätunnusloki',
	'editaccount-log-header' => 'Tämä sivu listaa Wikian henkilökunnan käyttäjäkohtaisiin asetuksiin tekemät muutokset.',
	'editaccount-log-entry-email' => 'muutti käyttäjän $2 sähköpostiosoitetta',
	'editaccount-log-entry-pass' => 'muutti käyttäjän $2 salasanaa',
	'editaccount-log-entry-realname' => 'käyttäjän $2 oikea nimi vaihtui',
	'editaccount-log-entry-close' => 'poisti käytöstä tunnuksen $2',
	'edit-account-closed-flag' => '<div style="border: 1px solid black; padding: 1em">Tämä tunnus on poistettu käytöstä.</div>',
	'right-editaccount' => 'Muokata toisten käyttäjien asetuksia',
);

/** French (Français)
 * @author Gomoko
 * @author IAlex
 * @author Peter17
 * @author Verdy p
 * @author Wyz
 */
$messages['fr'] = array(
	'editaccount' => 'Modifier le compte',
	'editaccount-desc' => "Permet aux membres du personnel de gérer les informations sur les comptes d'utilisateur",
	'editaccount-title' => 'Special:EditAccount',
	'editaccount-frame-manage' => 'Modifier un compte',
	'editaccount-frame-usage' => 'Note',
	'editaccount-usage' => "Les données des utilisateurs sont cachées séparément pour chaque wiki. Si vous réinitialisez le mot de passe ou l'adresse électronique, le cache ne sera annulé que pour ce wiki. Veuillez rediriger l'utilisateur vers ce wiki pour qu'il se connecte avec son nouveau mot de passe pour éviter les problèmes de cache.",
	'editaccount-label-select' => 'Sélectionner un compte utilisateur',
	'editaccount-submit-account' => 'Gérer le compte',
	'editaccount-frame-account' => 'Modification du compte utilisateur : $1',
	'editaccount-frame-close' => 'Désactiver le compte utilisateur : $1',
	'editaccount-label-email' => 'Définir une nouvelle adresse électronique',
	'editaccount-label-pass' => 'Définir un nouveau mot de passe',
	'editaccount-label-realname' => 'Définir un nouveau nom complet',
	'editaccount-label-clearunsub' => 'Désabonné',
	'editaccount-submit-email' => "Sauvegarder l'adresse électronique",
	'editaccount-submit-pass' => 'Sauvegarder le mot de passe',
	'editaccount-submit-realname' => 'Sauvegarder le nom complet',
	'editaccount-submit-clearunsub' => 'Effacer le désabonnement',
	'editaccount-submit-cleardisable' => 'Retirer le flag « désactivé »',
	'editaccount-submit-close' => 'Clore le compte',
	'editaccount-usage-close' => 'Vous pouvez également désactiver un compte utilisateur en cryptant son mot de passe et en supprimant son adresse électronique. Veuillez notez que les données seront perdues et ne seront pas récupérables.',
	'editaccount-warning-close' => '<b>Attention !</b> Vous êtes sur le point de désactiver le compte utilisateur <b>$1</b> de manière permanente. Ceci ne peut pas être défait. Êtes-vous certain de vouloir effectuer cette opération ?',
	'editaccount-status' => 'Message de statut',
	'editaccount-success-email' => "L'adresse électronique du compte $1 a été modifiée avec succès à $2.",
	'editaccount-success-email-blank' => "L'adresse électronique du compte $1 a été supprimée avec succès.",
	'editaccount-success-pass' => 'Le mot de passe du compte $1 a été modifié avec succès.',
	'editaccount-success-realname' => 'Le nom complet du compte $1 a été modifié avec succès.',
	'editaccount-success-unsub' => 'L’information de désabonnement a été retirée avec succès pour le compte $1.',
	'editaccount-success-disable' => 'Flag « désactivé » retiré avec succès pour le compte $1.',
	'editaccount-success-close' => 'Le compte $1 a été désactivé avec succès.',
	'editaccount-error-email' => "L'adresse électronique n'a pas été modifiée. Essayez de nouveau ou contactez l'équipe technique.",
	'editaccount-error-pass' => "Le mot de passe n'a pas été modifié. Essayez de nouveau ou contactez l'équipe technique.",
	'editaccount-error-realname' => "Le nom complet n'a pas été modifié. Essayez de nouveau ou contactez l'équipe technique.",
	'editaccount-error-close' => "Un problème est survenu lors de la fermeture du compte. Veuillez ré-essayer ou contacter l'équipe technique.",
	'editaccount-invalid-email' => "« $1 » n'est pas une adresse électronique valide !",
	'editaccount-nouser' => "Le compte « $1 » n'existe pas !",
	'editaccount-remove-avatar-fail' => 'Problème à l’auto-suppression de l’avatar.',
	'editaccount-requested' => 'Note : l’utilisateur a demandé la fermeture de son compte',
	'editaccount-not-requested' => 'ATTENTION : l’utilisateur n’a pas demandé la fermeture de son compte',
	'editaccount-labal-account-status' => 'État de compte',
	'editaccount-labal-email-status' => 'État du Courriel',
	'editaccount-status-confirmed' => 'Confirmé',
	'editaccount-status-unconfirmed' => 'Non confirmé',
	'editaccount-status-realuser' => 'Utilisateur réel',
	'editaccount-status-tempuser' => 'Utilisateur temporaire',
	'editaccount-error-tempuser-email' => 'Les utilisateurs temporaires ne peuvent pas avoir de champ Adresse de courriel vide; veuillez entrer une adresse de courriel.',
	'editaccount-email-change-requested' => "Un utilisateur a demandé le changement de courriel via les préférences de $1. Pour confirmer le changement d'adresse courriel demandé pour l'utilisateur, entrez l'adresse de courriel demandée dans le champ ci-dessous et cliquez sur «Enregistrer et confirmer».",
	'editaccount-log' => 'Journal des comptes utilisateurs',
	'editaccount-log-header' => 'Cette page liste les modifications faîtes au préférences utilisateur par le staff de Wikia.',
	'editaccount-log-entry-email' => "a modifié l'adresse électronique de l'utilisateur $2",
	'editaccount-log-entry-pass' => 'a modifié le mot de passe du compte $2',
	'editaccount-log-entry-realname' => 'a modifié le nom complet du compte $2',
	'editaccount-log-entry-close' => 'a désactivé le compte $2§',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;">Ce compte a été désactivé globalement par Wikia.</div>',
	'right-editaccount' => "Modifier les préférences d'autres utilisateurs",
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'editaccount' => 'Editar a conta',
	'editaccount-desc' => 'Permite que os membros do persoal xestionen a información das contas de usuario',
	'editaccount-title' => 'Special:EditAccount',
	'editaccount-frame-manage' => 'Editar unha conta',
	'editaccount-frame-usage' => 'Nota',
	'editaccount-usage' => 'Os datos de usuario gárdanse na memoria caché por separado para cada wiki. Cando restablece un contrasinal ou correo electrónico, a caché só se anulará para este wiki. Por favor, dirixa ao usuario ata este wiki para que acceda ao sistema co seu novo contrasinal para así evitar problemas de caché.',
	'editaccount-label-select' => 'Seleccionar unha conta de usuario',
	'editaccount-submit-account' => 'Xestionar a conta',
	'editaccount-frame-account' => 'Edición da conta de usuario: $1',
	'editaccount-frame-close' => 'Desactivar a conta de usuario: $1',
	'editaccount-label-email' => 'Establecer un novo enderezo de correo electrónico',
	'editaccount-label-pass' => 'Establecer un novo contrasinal',
	'editaccount-label-realname' => 'Establecer un novo nome real',
	'editaccount-label-clearunsub' => 'Cancelouse a subscrición',
	'editaccount-submit-email' => 'Gardar o correo electrónico',
	'editaccount-submit-pass' => 'Gardar o contrasinal',
	'editaccount-submit-realname' => 'Gardar o nome real',
	'editaccount-submit-clearunsub' => 'Desfacer a cancelación da subscrición',
	'editaccount-submit-cleardisable' => 'Retirar a marca de desactivado',
	'editaccount-submit-close' => 'Pechar a conta',
	'editaccount-usage-close' => 'Tamén pode desactivar unha conta de usuario codificando o seu contrasinal e eliminando o enderezo de correo electrónico. Teña en conta que se perderá esa información e non se poderá recuperar.',
	'editaccount-warning-close' => '<b>Coidado!</b> Está a piques de desactivar permanentemente a conta do usuario <b>$1</b>. Isto non se pode reverter. Está seguro de que é o que quere facer?',
	'editaccount-status' => 'Mensaxe de estado',
	'editaccount-success-email' => 'O correo electrónico da conta $1 cambiouse con éxito a $2.',
	'editaccount-success-email-blank' => 'Eliminouse correctamente o correo electrónico da conta $1.',
	'editaccount-success-pass' => 'Cambiouse con éxito o contrasinal da conta $1.',
	'editaccount-success-realname' => 'Cambiouse con éxito o nome real da conta $1.',
	'editaccount-success-unsub' => 'Eliminouse correctamente a cancelación da subscrición para a conta $1 .',
	'editaccount-success-disable' => 'Eliminouse correctamente a marca de desactivado para a conta $1 .',
	'editaccount-success-close' => 'Desactivouse con éxito a conta $1.',
	'editaccount-error-email' => 'Non se modificou o correo electrónico. Inténteo de novo ou póñase en contacto co equipo técnico.',
	'editaccount-error-pass' => 'Non se modificou o contrasinal. Inténteo de novo ou póñase en contacto co equipo técnico.',
	'editaccount-error-realname' => 'Non se modificou o nome real. Inténteo de novo ou póñase en contacto co equipo técnico.',
	'editaccount-error-close' => 'Houbo un problema ao pechar a conta. Inténteo de novo ou póñase en contacto co equipo técnico.',
	'editaccount-invalid-email' => '"$1" non é un enderezo de correo electrónico válido!',
	'editaccount-nouser' => 'A conta "$1" non existe!',
	'editaccount-remove-avatar-fail' => 'Problema durante a eliminación automática do avatar.',
	'editaccount-requested' => 'Nota: O usuario solicitou o peche da conta',
	'editaccount-not-requested' => 'AVISO: O usuario non solicitou o peche da conta',
	'editaccount-labal-account-status' => 'Estado da conta',
	'editaccount-labal-email-status' => 'Estado do correo electrónico',
	'editaccount-status-confirmed' => 'Confirmado',
	'editaccount-status-unconfirmed' => 'Sen confirmar',
	'editaccount-status-realuser' => 'Usuario real',
	'editaccount-status-tempuser' => 'Usuario temporal',
	'editaccount-error-tempuser-email' => 'Os usuarios temporais non poden deixar en branco o campo do correo electrónico. Insira un enderezo.',
	'editaccount-email-change-requested' => 'O usuario solicitou un cambio de correo electrónico mediante as preferencias a $1. Para confirmar o cambio no enderezo de correo electrónico do usuario, insira o enderezo solicitado no campo inferior e prema en "Gardar e confirmar".',
	'editaccount-log' => 'Rexistro de contas de usuario',
	'editaccount-log-header' => 'Esta páxina lista as modificacións feitas ás preferencias do usuario polo persoal de Wikia.',
	'editaccount-log-entry-email' => 'cambiou o correo electrónico do usuario $2',
	'editaccount-log-entry-pass' => 'cambiou o contrasinal do usuario $2',
	'editaccount-log-entry-realname' => 'cambiou o nome real do usuario $2',
	'editaccount-log-entry-close' => 'desactivou a conta $2',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;">Wikia desactivou esta conta globalmente.</div>',
	'right-editaccount' => 'Editar as preferencias doutros usuarios',
);

/** Hebrew (עברית)
 * @author שומבלע
 */
$messages['he'] = array(
	'right-editaccount' => 'עריכת מידע של משתמשים אחרים',
);

/** Hungarian (Magyar)
 * @author Dani
 * @author Glanthor Reviol
 * @author Misibacsi
 */
$messages['hu'] = array(
	'editaccount' => 'Felhasználói fiók szerkesztése',
	'editaccount-desc' => 'Lehetővé teszi a személyzet tagjainak, hogy kezeljék a felhasználói fiókok információit',
	'editaccount-title' => 'Special:Felhasználói fiók szerkesztése',
	'editaccount-frame-manage' => 'Egy felhasználói fiók szerkesztése',
	'editaccount-frame-usage' => 'Megjegyzés',
	'editaccount-label-select' => 'Felhasználói fiók kiválasztása',
	'editaccount-submit-account' => 'Felhasználói fiók kezelése',
	'editaccount-frame-account' => 'Felhasználói adatok szerkesztése: $1 fiókja',
	'editaccount-frame-close' => 'Felhasználói fiók tiltása: $1 részére',
	'editaccount-label-email' => 'Új e-mail cím beállítása',
	'editaccount-label-pass' => 'Új jelszó beállítása',
	'editaccount-label-realname' => 'Új valódi név beállítása',
	'editaccount-label-clearunsub' => 'Leiratkozott',
	'editaccount-submit-email' => 'E-mail mentése',
	'editaccount-submit-pass' => 'Jelszó mentése',
	'editaccount-submit-realname' => 'Valódi név mentése',
	'editaccount-submit-clearunsub' => 'Leiratkozás törlése',
	'editaccount-submit-close' => 'Felhasználói fiók lezárása',
	'editaccount-status' => 'Állapotüzenet',
	'editaccount-success-email' => 'A(z) $1 felhasználói fiók email címe sikeresen megváltoztatva erre: $2.',
	'editaccount-success-email-blank' => 'A(z) $1 felhasználói fiók email címe sikeresen eltávolítva.',
	'editaccount-success-pass' => 'Sikeresen megváltozott a jelszó  $1  számára',
	'editaccount-success-realname' => 'Sikeresen megváltozott a valódi név  $1  számára',
	'editaccount-success-close' => '„$1” felhasználói fiók sikeresen letiltva.',
	'editaccount-error-email' => 'Az e-mail nem változott meg. Próbálja újra, vagy lépjen kapcsolatba a műszaki csoporttal.',
	'editaccount-error-pass' => 'A jelszó nem változott meg. Próbálja újra, vagy lépjen kapcsolatba a műszaki csoporttal.',
	'editaccount-error-realname' => 'A valódi név nem változott meg. Próbálja újra, vagy lépjen kapcsolatba a műszaki csoporttal.',
	'editaccount-error-close' => 'Hiba történt a fiók szerkesztése közben. Próbálja újra, vagy lépjen kapcsolatba a műszaki csoporttal.',
	'editaccount-invalid-email' => '"$1" nem érvényes e-mail cím!',
	'editaccount-nouser' => 'A(z) „$1” felhasználói fiók nem létezik!',
	'editaccount-log' => 'Felhasználói fiókok naplója',
	'editaccount-log-entry-email' => '„$2” e-mail címe megváltoztatva',
	'editaccount-log-entry-pass' => '„$2” jelszava megváltoztatva',
	'editaccount-log-entry-realname' => '„$2” valódi neve megváltoztatva',
	'editaccount-log-entry-close' => '„$2” felhasználói fiók letiltva',
	'right-editaccount' => 'más felhasználók beállításainak szerkesztése',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'editaccount' => 'Modificar conto',
	'editaccount-desc' => 'Permitte que membros del personal modifica informationes de contos de usatores',
	'editaccount-title' => 'Special:Modificar conto',
	'editaccount-frame-manage' => 'Modificar un conto',
	'editaccount-frame-usage' => 'Nota',
	'editaccount-usage' => 'Le datos de usator es retenite in cache separatemente pro cata wiki. Si tu reinitialisa un contrasigno o adresse de e-mail, le cache essera radite solmente pro iste wiki. Per favor dirige le usator a iste wiki pro aperir un session con un contrasigno novemente definite pro evitar problemas de cache.',
	'editaccount-label-select' => 'Selige un conto de usator',
	'editaccount-submit-account' => 'Gerer conto',
	'editaccount-frame-account' => 'Modification del conto de usator: $1',
	'editaccount-frame-close' => 'Disactivar le conto de usator: $1',
	'editaccount-label-email' => 'Definir nove adresse de e-mail',
	'editaccount-label-pass' => 'Definir nove contrasigno',
	'editaccount-label-realname' => 'Definir nove nomine real',
	'editaccount-label-clearunsub' => 'Subscription cancellate',
	'editaccount-submit-email' => 'Salveguardar e-mail',
	'editaccount-submit-pass' => 'Salveguardar contrasigno',
	'editaccount-submit-realname' => 'Salveguardar nomine real',
	'editaccount-submit-clearunsub' => 'Rader cancellation de subscription',
	'editaccount-submit-cleardisable' => 'Reactivar',
	'editaccount-submit-close' => 'Clauder conto',
	'editaccount-usage-close' => 'Tu pote equalmente disactivar un conto de usator per cryptar le contrasigno e remover le adresse de e-mail. Nota que iste datos essera irrecuperabilemente perdite.',
	'editaccount-warning-close' => '<b>Attention!</b> Tu es super le puncto de disactivar permanentemente le conto del usator <b>$1</b>. Isto es irreversibile. Es tu secur de voler facer isto?',
	'editaccount-status' => 'Message de stato',
	'editaccount-success-email' => 'E-mail del conto $1 cambiate a $2 con successo.',
	'editaccount-success-email-blank' => 'Le e-mail del conto $1 ha essite removite.',
	'editaccount-success-pass' => 'Contrasigno del conto $1 cambiate con successo.',
	'editaccount-success-realname' => 'Nomine real del conto $1 cambiate con successo.',
	'editaccount-success-unsub' => 'Le indicator de cancellation de subscription ha essite radite pro le conto $1.',
	'editaccount-success-disable' => 'Le conto $1 non plus es disactivate.',
	'editaccount-success-close' => 'Conto $1 disactivate con successo.',
	'editaccount-error-email' => 'Le adresse de e-mail non ha essite cambiate. Reproba o contacta le equipa technic.',
	'editaccount-error-pass' => 'Le contrasigno non ha essite cambiate. Reproba o contacta le equipa technic.',
	'editaccount-error-realname' => 'Le nomine real non ha essite cambiate. Reproba o contacta le equipa technic.',
	'editaccount-error-close' => 'Un problema occurreva durante le clausura del conto. Reproba o contacta le equipa technic.',
	'editaccount-invalid-email' => '"$1" non es un adresse de e-mail valide!',
	'editaccount-nouser' => 'Le conto "$1" non existe!',
	'editaccount-remove-avatar-fail' => 'Problema durante le elimination automatic del avatar.',
	'editaccount-requested' => 'Nota: Le usator ha requestate le clausura de un conto',
	'editaccount-not-requested' => 'ATTENTION: Le usator non ha requestate le clausura de un conto',
	'editaccount-labal-account-status' => 'Stato del conto',
	'editaccount-labal-email-status' => 'Stato de e-mail',
	'editaccount-status-confirmed' => 'Confirmate',
	'editaccount-status-unconfirmed' => 'Non confirmate',
	'editaccount-status-realuser' => 'Usator real',
	'editaccount-status-tempuser' => 'Usator temporari',
	'editaccount-error-tempuser-email' => 'Le usatores temporari non pote haber un campo de adresse de e-mail vacue. Per favor specifica un adresse de e-mail.',
	'editaccount-email-change-requested' => 'Le usator requestava un cambio de e-mail via le Preferentias a $1. Pro confirmar le cambio de adresse de e-mail requestate pro iste usator, entra le adresse de e-mail requestate in le campo hic infra e clicca sur "Salveguardar e confirmar".',
	'editaccount-log' => 'Registro de contos de usator',
	'editaccount-log-header' => 'Iste pagina lista le cambios facite al preferentias de usator per le personal de Wikia.',
	'editaccount-log-entry-email' => 'cambiava le adresse de e-mail del usator $2',
	'editaccount-log-entry-pass' => 'cambiava le contrasigno del usator $2',
	'editaccount-log-entry-realname' => 'cambiava le nomine real del usator $2',
	'editaccount-log-entry-close' => 'disactivava le conto $2',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;">Iste conto ha essite disactivate globalmente per Wikia.</div>',
	'right-editaccount' => 'Modificar le preferentias de altere usatores',
);

/** Indonesian (Bahasa Indonesia)
 * @author Aldnonymous
 * @author Irwangatot
 */
$messages['id'] = array(
	'editaccount' => 'Menyunting akun',
	'editaccount-desc' => 'Perbolehkan anggota staff untuk mengelola informasi akun pengguna',
	'editaccount-title' => 'Khusus: SuntingAkun',
	'editaccount-frame-manage' => 'Menyunting akun',
	'editaccount-frame-usage' => 'Catatan',
	'editaccount-usage' => 'Cache data pengguna terpisah untuk tiap-tiap wiki. Ketika Anda me-reset Kata sandi atau e-mail, chace akan ditangkap hanya pada wiki ini saja. Silahkan arahkan pengguna ke wiki ini untuk log in dengan kata sandi yang baru untuk menghindari masalah cache.',
	'editaccount-label-select' => 'Pilih akun pengguna',
	'editaccount-submit-account' => 'Kelola akun',
	'editaccount-frame-account' => 'Menyunting akun pengguna: $1',
	'editaccount-frame-close' => 'Menonaktifkan akun pengguna: $1',
	'editaccount-label-email' => 'Menetapkan alamat e-mail baru',
	'editaccount-label-pass' => 'Mengatur kata sandi baru',
	'editaccount-label-realname' => 'Menetapkan nama baru',
	'editaccount-label-clearunsub' => 'Berhenti berlangganan',
	'editaccount-submit-email' => 'Simpan alamat e-mail',
	'editaccount-submit-pass' => 'Simpan kata sandi',
	'editaccount-submit-realname' => 'Simpan nama asli',
	'editaccount-submit-clearunsub' => 'Hapus yang tidak berlangganan',
	'editaccount-submit-cleardisable' => 'Hilangkan nonaktifkan bendera',
	'editaccount-submit-close' => 'Tutup akun',
	'editaccount-usage-close' => 'Anda juga dapat menonaktifkan account pengguna dengan mengacak kata sandinya dan menghapus alamat e-mail. Catatan data yang hilang tidak dapat dikembalikan.',
	'editaccount-warning-close' => '<b>Hati-hati!</b> Anda akan menonaktifkan akun pengguna  <b> $1 </b> secara permanen. Tindakan ini tidak dapat dikembalikan. Apakah yakin anda mau melakukannya?',
	'editaccount-status' => 'Pesan status',
	'editaccount-success-email' => 'Berhasil mengubah alamat e-mail akun  $1  ke $2 .',
	'editaccount-success-email-blank' => 'Berhasil menghapus alamat e-mail account  $1 .',
	'editaccount-success-pass' => 'Berhasil mengubah kata sandi untuk akun  $1 .',
	'editaccount-success-realname' => 'Berhasil mengubah nama untuk akun  $1 .',
	'editaccount-success-unsub' => 'Berhasil menghapus berhenti berlangganan bit ke akun $1',
	'editaccount-success-disable' => 'Berhasil menghapus nonaktif bit untuk akun $1',
	'editaccount-success-close' => 'Berhasil menonakltifkan akun $1',
	'editaccount-error-email' => 'E-mail tidak berubah. Coba lagi atau hubungi tim Tech.',
	'editaccount-error-pass' => 'Kata sandi tidak berubah. Coba lagi atau hubungi tim Tech.',
	'editaccount-error-realname' => 'Nama asli tidak berubah. Coba lagi atau hubungi tim Tech.',
	'editaccount-error-close' => 'Masalah terjadi ketika menutup account. Coba lagi atau hubungi tim Tech.',
	'editaccount-invalid-email' => '" $1 " bukanlah alamat e-mail yang valid!',
	'editaccount-nouser' => 'Akun " $1 "tidak ada!',
	'editaccount-remove-avatar-fail' => 'Masalah dalam hapus otomatis avatar.',
	'editaccount-log' => 'Catatan akun pengguna',
	'editaccount-log-header' => 'Halaman ini berisi daftar perubahan yang dibuat untuk informasi pengguna oleh staf Wikia.',
	'editaccount-log-entry-email' => 'mengubah alamat e-mail untuk pengguna $2',
	'editaccount-log-entry-pass' => 'mengubah kata sandi untuk user $2',
	'editaccount-log-entry-realname' => 'mengubah nama asli untuk pengguna$2',
	'editaccount-log-entry-close' => 'menonaktifkan akun $2',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;"> Akun ini telah dinonaktifkan secara global oleh Wikia. </div>',
	'right-editaccount' => 'Menyunting informasi pengguna lain',
);

/** Italian (Italiano)
 * @author HalphaZ
 * @author Leviathan 89
 * @author Pietrodn
 */
$messages['it'] = array(
	'editaccount' => 'Modifica account',
	'editaccount-desc' => 'Consente ai membri dello staff di gestire le informazioni degli utenti',
	'editaccount-title' => 'Speciale:ModificaAccount',
	'editaccount-frame-manage' => 'Modifica account',
	'editaccount-frame-usage' => 'Nota',
	'editaccount-usage' => "I dati dell'utente vengono memorizzati nella cache separatamente per ogni wiki. Quando si reimposta una password o una e-mail, la cache sarà invalidata solo per questa wiki. Si prega di indirizzare l'utente a questa wiki per accedere con una password appena impostata per evitare problemi di cache.",
	'editaccount-label-select' => 'Selezionare un account utente',
	'editaccount-submit-account' => 'Gestisci account',
	'editaccount-frame-account' => "Modifica dell'account utente $1",
	'editaccount-frame-close' => "Disattiva l'account utente $1",
	'editaccount-label-email' => 'Imposta un nuovo indirizzo e-mail',
	'editaccount-label-pass' => 'Riscrivi la nuova password',
	'editaccount-label-realname' => 'Imposta il nuovo nome reale',
	'editaccount-submit-email' => 'Salva e-mail',
	'editaccount-submit-pass' => 'Salva password',
	'editaccount-submit-realname' => 'Salva il nome reale',
	'editaccount-submit-close' => 'Chiudi account',
	'editaccount-usage-close' => "È anche possibile disattivare un account utente rimescolando la relativa password e rimuovendo l'indirizzo di posta elettronica. Si noti che questi dati saranno persi e non saranno recuperabili.",
	'editaccount-warning-close' => "<b>Attenzione:</b> Si sta per disabilitare permanentemente l'account dell'utente <b>$1.</b> Ciò non può essere annullato. Sicuro che sia quello che vuoi fare?",
	'editaccount-status' => 'Messaggio di stato',
	'editaccount-success-email' => "L'indirizzo e-mail per l'account $1 è stato cambiato con successo a $2.",
	'editaccount-success-email-blank' => "E-mail rimossa con successo dall'account $1.",
	'editaccount-success-pass' => "Password per l'account $1 cambiata con successo.",
	'editaccount-success-realname' => "Nome reale per l'account $1 cambiato con successo.",
	'editaccount-success-close' => 'Account $1 disabilitato con successo.',
	'editaccount-error-email' => "L'e-mail non è stata cambiata. Riprova o contatta il Team Tecnico.",
	'editaccount-error-pass' => 'La password non è stata cambiata. Riprova o contatta il Team Tecnico.',
	'editaccount-error-realname' => 'Nome reale non cambiato. Riprova o contatta il Team Tecnico.',
	'editaccount-error-close' => "Si è verificato un problema alla chiusura dell'account. Riprova o contatta il Team Tecnico.",
	'editaccount-invalid-email' => '"$1" non è un indirizzo e-mail valido!',
	'editaccount-nouser' => 'L\'account "$1" non esiste!',
	'editaccount-log' => 'Registro account utente',
	'editaccount-log-header' => 'Questa pagina elenca le modifiche alle preferenze utente effettuate dallo Staff Wikia.',
	'editaccount-log-entry-email' => "E-mail dell'utente $2 cambiata",
	'editaccount-log-entry-pass' => "Password dell'utente $2 cambiata",
	'editaccount-log-entry-realname' => "Nome reale dell'utente $2 cambiato",
	'editaccount-log-entry-close' => 'Account $2 disabilitato',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;">Questo account è stato globalmente disattivato da Wikia.</div>',
	'right-editaccount' => 'Modifica le preferenze degli altri utenti',
);

/** Khmer (ភាសាខ្មែរ)
 * @author គីមស៊្រុន
 */
$messages['km'] = array(
	'editaccount' => 'កែប្រែគណនី​',
	'editaccount-desc' => 'អនុញ្ញាតអោយបុគ្គលិកគ្រប់គ្រងព័ត៌មានគណនីអ្នកប្រើប្រាស់របស់អ្នក',
	'editaccount-frame-manage' => 'កែប្រែគណនី​មួយ',
	'editaccount-frame-usage' => 'កំណត់សម្គាល់',
	'editaccount-label-select' => 'ជ្រើសរើសគណនីអ្នកប្រើប្រាស់មួយ',
	'editaccount-submit-account' => 'គ្រប់គ្រងគណនី',
	'editaccount-frame-account' => 'កំពុងកែប្រែគណនីអ្នកប្រើប្រាស់៖ $1',
	'editaccount-frame-close' => 'បិទគណនីរបស់អ្នកប្រើប្រាស់៖ $1',
	'editaccount-label-email' => 'ដូរអាសយដ្ឋានអ៊ីមែលថ្មី',
	'editaccount-label-pass' => 'ដូរពាក្យសំងាត់ថ្មី',
	'editaccount-label-realname' => 'ដូរឈ្មោះពិតថ្មី',
	'editaccount-label-clearunsub' => 'ឈប់ជាវ',
	'editaccount-submit-email' => 'រក្សាទុកអាសយដ្ឋានអ៊ីមែល',
	'editaccount-submit-pass' => 'រក្សាទុកពាក្យសំងាត់',
	'editaccount-submit-realname' => 'រក្សាទុកឈ្មោះពិត',
	'editaccount-submit-clearunsub' => 'សំអាតការឈប់ជាវ',
	'editaccount-submit-close' => 'បិទគណនី',
	'editaccount-status' => 'សារស្ថានភាព',
	'editaccount-success-email' => 'បានប្ដូរអាសយដ្ឋានអ៊ីមែលសំរាប់គណនី $1 ទៅជា $2 បានសំរេច។',
	'editaccount-success-email-blank' => 'បានដកចេញអាសយដ្ឋានអ៊ីមែលសំរាប់គណនី $1 បានសំរេច។',
	'editaccount-success-pass' => 'បានប្ដូរពាក្យសំងាត់សំរាប់គណនី $1 បានសំរេច។',
	'editaccount-success-realname' => 'បានប្ដូរឈ្មោះពិតសំរាប់គណនី $1 បានសំរេច។',
	'editaccount-success-close' => 'បានបិទគណនី $1 បានសំរេច។',
	'editaccount-error-email' => 'អ៊ីមែលមិនត្រូវបានប្ដូរទេ។ សូមសាកល្បងម្ដងទៀតឬទាក់ទងទៅក្រុមបច្ចេកទេស។',
	'editaccount-error-pass' => 'ពាក្យសំងាត់មិនត្រូវបានប្ដូរទេ។ សូមសាកល្បងម្ដងទៀតឬទាក់ទងទៅក្រុមបច្ចេកទេស។',
	'editaccount-error-realname' => 'ឈ្មោះពិតមិនត្រូវបានប្ដូរទេ។ សូមសាកល្បងម្ដងទៀតឬទាក់ទងទៅក្រុមបច្ចេកទេស។',
	'editaccount-error-close' => 'មានបញ្ហាកើតឡើងពេលកំពុងបិទគណនី។ សូមសាកល្បងម្ដងទៀតឬទាក់ទងទៅក្រុមបច្ចេកទេស។',
	'editaccount-invalid-email' => '"$1" មិនមែនជាអាសយដ្ឋានអ៊ីមែលមានសុពលភាពទេ!',
	'editaccount-nouser' => 'គណនី "$1" មិនមានទេ!',
	'editaccount-log' => 'កំណត់ត្រាស្ដីពីគណនីអ្នកប្រើប្រាស់',
	'editaccount-log-header' => 'ទំព័រនេះជាបញ្ជីកំនែប្រែដែលធ្វើឡើងលើចំណង់ចំណូលចិត្តរបស់អ្នកប្រើ ដោយបុគ្គលិក Wikia។',
	'editaccount-log-entry-email' => 'បានប្ដូរអ៊ីមែលសំរាប់អ្នកប្រើប្រាស់ $2',
	'editaccount-log-entry-pass' => 'បានប្ដូរពាក្យសំងាត់សំរាប់អ្នកប្រើប្រាស់ $2',
	'editaccount-log-entry-realname' => 'បានប្ដូរឈ្មោះពិតសំរាប់អ្នកប្រើប្រាស់ $2',
	'editaccount-log-entry-close' => 'បានបិទគណនី $2',
	'edit-account-closed-flag' => '<div style="border: 1px solid black; padding: 1em">គណនីនេះត្រូវបានបិទហើយ។</div>',
	'right-editaccount' => 'កែប្រែចំណង់ចំណូលចិត្តរបស់អ្នកប្រើប្រាស់ដទៃ',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'editaccount' => 'Kont änneren',
	'editaccount-title' => 'Spezial:Kont änneren',
	'editaccount-frame-manage' => 'E Kont änneren',
	'editaccount-frame-usage' => 'Notiz',
	'editaccount-label-select' => 'E Benotzerkont eraussichen',
	'editaccount-label-email' => 'Nei E-Mailadress festleeën',
	'editaccount-label-pass' => 'Neit Passwuert festleeën',
	'editaccount-submit-email' => 'E-Mailadress späicheren',
	'editaccount-submit-pass' => 'Passwuert späicheren',
	'editaccount-submit-realname' => 'Richtegen Numm späicheren',
	'editaccount-submit-close' => 'Kont zoumaachen',
	'editaccount-invalid-email' => '"$1" ass keng valabel E-Mailadress!',
	'editaccount-nouser' => 'De Kont "$1" gëtt et net!',
	'editaccount-log' => 'Logbuch vun de Benotzerkonten',
	'editaccount-log-entry-realname' => 'huet de richtegen Numm vum Benotzer $2 geännert',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;">Dëse Benotzerkont gouf global desaktivéiert.</div>',
	'right-editaccount' => 'Aner Benotzerastellungen änneren',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'editaccount' => 'Уреди сметка',
	'editaccount-desc' => 'Им овозможува на членовите на персоналот да раководат со информациите за корисничките сметки',
	'editaccount-title' => 'Специјални:УредиСметка',
	'editaccount-frame-manage' => 'Уреди сметка',
	'editaccount-frame-usage' => 'Напомена',
	'editaccount-usage' => 'Корисничките податоци се кешираат посебно за секое вики. Кога ќе смените лозинка или е-пошта, кешот ќе се поднови само за ова вики. Упатете го корисникот кон ова вики да се најави со новосоздадена лозинка, за да избегне проблеми со кеширање.',
	'editaccount-label-select' => 'Одберете корисничка сметка',
	'editaccount-submit-account' => 'Раководење со сметка',
	'editaccount-frame-account' => 'Уредување на корисничка сметка: $1',
	'editaccount-frame-close' => 'Оневозможи корисничка сметка: $1',
	'editaccount-label-email' => 'Нова е-поштенска адреса',
	'editaccount-label-pass' => 'Нова лозинка',
	'editaccount-label-realname' => 'Ново вистинско име',
	'editaccount-label-clearunsub' => 'Откажани претплати',
	'editaccount-submit-email' => 'Зачувај е-пошта',
	'editaccount-submit-pass' => 'Зачувај лозинка',
	'editaccount-submit-realname' => 'Зачувај вистинско име',
	'editaccount-submit-clearunsub' => 'Исчисти откажани',
	'editaccount-submit-cleardisable' => 'Исчисти оневозмож. знаме',
	'editaccount-submit-close' => 'Затвори сметка',
	'editaccount-usage-close' => 'Можете да оневозможите корисничка сметка со тоа што ќе ја претворите лозинката во нечитлива и ќе ја отстраните е-поштенската адреса. Имајте на ум дека овие податоци ќе се изгубат и нема да можат да се вратат.',
	'editaccount-warning-close' => '<b>Внимание!</b> На пат сте засекогаш да ја оневозможите сметката на корисникот <b>$1</b>. Оваа постапка не може да се врати. Дали сте сигурни дека сакате да го направите ова?',
	'editaccount-status' => 'Статусна порака',
	'editaccount-success-email' => 'Е-поштата за сметката $1 е успешно променета на $2.',
	'editaccount-success-email-blank' => 'Е-поштата за сметката $1 е успешно отстранета.',
	'editaccount-success-pass' => 'Лозинката за сметката $1 е успешно променета.',
	'editaccount-success-realname' => 'Вистинското име за сметката $1 е успешно променето.',
	'editaccount-success-unsub' => 'Успешно ги отстранивте откажаните претплати на сметката $1.',
	'editaccount-success-disable' => 'Успешно го отстранивте оневозможениот дел од сметката $1.',
	'editaccount-success-close' => 'Сметката $1 е успешно оневозможена.',
	'editaccount-error-email' => 'Е-поштата не е променета. Обидете се повторно или контактирајте ја Екипата за техничка поддршка',
	'editaccount-error-pass' => 'Лозинката не е променета. Обидете се повторно или контактирајте ја Екипата за техничка поддршка.',
	'editaccount-error-realname' => 'Вистинското име не е променето. Обидете се повторно или контактирајте ја Екипата за техничка поддршка.',
	'editaccount-error-close' => 'Се појави проблем при затворањето на сметката. Обидете се повторно или контактирајте ја Екипата за техничка поддршка',
	'editaccount-invalid-email' => '„$1“ не е важечка е-поштенска адреса!',
	'editaccount-nouser' => 'Сметката „$1“ не поостои',
	'editaccount-remove-avatar-fail' => 'Проблем при автоотстранување на аватарот.',
	'editaccount-requested' => 'Напомена: Корисникот има побарано затворање на сметката',
	'editaccount-not-requested' => 'ВНИМАНИЕ: Корисникот нема пријавено затворање на сметката',
	'editaccount-labal-account-status' => 'Статус на сметка',
	'editaccount-labal-email-status' => 'Статус на е-пошта',
	'editaccount-status-confirmed' => 'Потврдено',
	'editaccount-status-unconfirmed' => 'Непотврдено',
	'editaccount-status-realuser' => 'Вистински корисник',
	'editaccount-status-tempuser' => 'Привремен корисник',
	'editaccount-error-tempuser-email' => 'Привремените корисници мора да внесат е-пошта. Внесете ја.',
	'editaccount-email-change-requested' => 'Корисникот преку нагодувањата побара промена на е-поштата во $1. За да ја потврдите промената, внесете ја бараната адреса во долунаведеното поле и стиснете на „Зачувај и потврди“.',
	'editaccount-log' => 'Дневник на кориснички сметки',
	'editaccount-log-header' => 'Оваа страница ги прикажува промените во нагодувањата на корисниците направени од персоналот на Викија',
	'editaccount-log-entry-email' => 'променета е-поштата на корисникот $2',
	'editaccount-log-entry-pass' => 'променета лозинката на корисникот $2',
	'editaccount-log-entry-realname' => 'променето вистинското име на корисникот $2',
	'editaccount-log-entry-close' => 'оневозможена сметка $2',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;">Оваа сметка е глобално оневозможена од Викија.</div>',
	'right-editaccount' => 'Уредување на нагодувања на други корисници',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 */
$messages['ms'] = array(
	'editaccount' => 'Sunting akaun',
	'editaccount-desc' => 'Membolehkan kakitangan menguruskan maklumat akaun pengguna',
	'editaccount-title' => 'Khas:EditAccount',
	'editaccount-frame-manage' => 'Sunting akaun',
	'editaccount-frame-usage' => 'Catatan',
	'editaccount-usage' => 'Data pengguna disimpan dalam cache wiki masing-masing secara berasingan. Apabila anda mereset kata laluan/e-emel, cachenya hanya diubah di wiki ini sahaja. Sila alihkan pengguna ke wiki ini untuk mengelog masuk dengan kata laluan barunya untuk mengelakkan masalah cache.',
	'editaccount-label-select' => 'Pilih akaun pengguna',
	'editaccount-submit-account' => 'Uruskan akaun',
	'editaccount-frame-account' => 'Menyunting akaun pengguna: $1',
	'editaccount-frame-close' => 'Matikan akaun pengguna: $1',
	'editaccount-label-email' => 'Tetapkan alamat e-mel baru',
	'editaccount-label-pass' => 'Tetapkan kata laluan baru',
	'editaccount-label-realname' => 'Tetapkan nama sebenar baru',
	'editaccount-label-clearunsub' => 'Langganan dihentikan',
	'editaccount-submit-email' => 'Simpan dan terima alamat e-mel',
	'editaccount-submit-pass' => 'Simpan kata laluan',
	'editaccount-submit-realname' => 'Simpan nama sebenar',
	'editaccount-submit-clearunsub' => 'Padamkan penghentian melanggan',
	'editaccount-submit-cleardisable' => 'Bersihkan bendera matikan',
	'editaccount-submit-close' => 'Tutup akaun',
	'editaccount-usage-close' => 'Anda juga boleh mematikan akaun pengguna dengan mengarau kata laluannya serta menggugurkan alamat e-melnya. Ingat, data ini akan hilang dan tidak boleh dipulihkan.',
	'editaccount-warning-close' => '<b>Perhatian!</b> Anda akan mematikan akaun pengguna <b>$1</b> buat selamanya. Tindakan ini tidak boleh diterbalikkan. Adakah anda pasti mahu berbuat demikian?',
	'editaccount-status' => 'Mesej status',
	'editaccount-success-email' => 'Alamat e-mel pemegang akaun $1 berjaya diubah kepada $2.',
	'editaccount-success-email-blank' => 'Alamat e-mel pemegang akaun $1 berjaya digugurkan.',
	'editaccount-success-pass' => 'Kata laluan akaun $1 berjaya diubah.',
	'editaccount-success-realname' => 'Nama sebenar pemegang akaun $1 berjaya diubah.',
	'editaccount-success-unsub' => 'Butiran nyahlanggan akaun $1 berjaya digugurkan.',
	'editaccount-success-disable' => 'Butiran termati akaun $1 berjaya digugurkan.',
	'editaccount-success-close' => 'Akaun $1 berjaya dimatikan.',
	'editaccount-error-email' => 'E-mel tidak diubah. Cuba lagi atau hubungi Pasukan Teknikal (Tech Team).',
	'editaccount-error-pass' => 'Kata laluan tidak diubah. Cuba lagi atau hubungi Pasukan Teknikal (Tech Team).',
	'editaccount-error-realname' => 'Nama sebenar tidak diubah. Cuba lagi atau hubungi Pasukan Teknikal (Tech Team).',
	'editaccount-error-close' => 'Ada masalah dalam cubaan menutup akaun. Cuba lagi atau hubungi Pasukan Teknikal (Tech Team).',
	'editaccount-invalid-email' => '"$1" bukan alamat e-mel yang sah!',
	'editaccount-nouser' => 'Akaun "$1" tidak wujud!',
	'editaccount-remove-avatar-fail' => 'Masalah ketika membuang avatar secara automatik.',
	'editaccount-requested' => 'Perhatian: Pengguna memohon penutupan akaun',
	'editaccount-not-requested' => 'AWAS: Pengguna tidak memohon penutupan akaun',
	'editaccount-labal-account-status' => 'Status Akaun',
	'editaccount-labal-email-status' => 'Status E-mel',
	'editaccount-status-confirmed' => 'Disahkan',
	'editaccount-status-unconfirmed' => 'Belum disahkan',
	'editaccount-status-realuser' => 'Pengguna Aktif',
	'editaccount-status-tempuser' => 'Pengguna Tak Aktif',
	'editaccount-error-tempuser-email' => 'Pengguna tak aktif tidak boleh membiarkan ruangan alamat e-mel kosong; sila isikan alamat e-mel.',
	'editaccount-email-change-requested' => 'Pengguna ini memohon penukaran alamat e-mel kepada $1 melalui Keutamaan. Untuk menerima penukaran alamat e-mel yang dipohon untuk pengguna tersebut, taipkan alamat e-mel yang dipohon itu dalam ruangan di bawah, kemudian klik "Simpan dan terima."',
	'editaccount-log' => 'Log akaun pengguna',
	'editaccount-log-header' => 'Laman ini menyenaraikan perubahan yang dilakukan oleh Kakitangan Wikia pada keutamaan pengguna.',
	'editaccount-log-entry-email' => 'mengubah e-mel pengguna $2',
	'editaccount-log-entry-pass' => 'mengubah kata laluan pengguna $2',
	'editaccount-log-entry-realname' => 'mengubah nama sebenar pengguna $2',
	'editaccount-log-entry-close' => 'mematikan akaun $2',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;">Akaun ini telah dimatikan secara global oleh Wikia.</div>',
	'right-editaccount' => 'Sunting keutamaan pengguna lain',
);

/** Norwegian Bokmål (‪Norsk (bokmål)‬)
 * @author Audun
 * @author Nghtwlkr
 */
$messages['nb'] = array(
	'editaccount' => 'Rediger konto',
	'editaccount-desc' => 'Lar ledelsesmedlemmer administrere brukerkontoinformasjon',
	'editaccount-title' => 'Special:EditAccount',
	'editaccount-frame-manage' => 'Rediger en konto',
	'editaccount-frame-usage' => 'Merk',
	'editaccount-usage' => 'Brukerdata blir mellomlagret separat for hver wiki. Når du tilbakestiller et passord eller en e-post, vil mellomlageret kun bli tømt for denne wikien. Vennligst led brukeren til denne wikien for å logge inn med det nyinnsatte passordet for å unngå problemer med mellomlageret.',
	'editaccount-label-select' => 'Velg en brukerkonto',
	'editaccount-submit-account' => 'Administrer konto',
	'editaccount-frame-account' => 'Redigerer brukerkonto: $1',
	'editaccount-frame-close' => 'Deaktiver brukerkonto: $1',
	'editaccount-label-email' => 'Angi ny e-postadresse',
	'editaccount-label-pass' => 'Angi nytt passord',
	'editaccount-label-realname' => 'Angi nytt virkelig navn',
	'editaccount-label-clearunsub' => 'Avsluttet abonnement',
	'editaccount-submit-email' => 'Lagre e-post',
	'editaccount-submit-pass' => 'Lagre passord',
	'editaccount-submit-realname' => 'Lagre virkelig navn',
	'editaccount-submit-clearunsub' => 'Tøm avslutt abonnement',
	'editaccount-submit-cleardisable' => 'Fjern deaktiveringsflagget',
	'editaccount-submit-close' => 'Lukk konto',
	'editaccount-usage-close' => 'Du kan også deaktivere en brukerkonto ved å tilfeldiggjøre passordet og fjerne e-postadressen. Legg merke til at denne dataen går tapt og ikke vil kunne gjenopprettes.',
	'editaccount-warning-close' => '<b>Forsiktig!</b> Du er i ferd med å permanent deaktivere kontoen til bruker <b>$1</b>. Dette kan ikke gjenopprettes. Er du sikker på at det er det du vil gjøre?',
	'editaccount-status' => 'Statusmelding',
	'editaccount-success-email' => 'Endret e-post for konto $1 til $2.',
	'editaccount-success-email-blank' => 'Fjernet e-post for kontoen $1.',
	'editaccount-success-pass' => 'Endret passord for konto $1.',
	'editaccount-success-realname' => 'Endret virkelig navn for konto $1.',
	'editaccount-success-unsub' => 'Fjernet avslutt abonnement-delen for kontoen $1.',
	'editaccount-success-disable' => 'Fjernet den deaktiverte delen for kontoen $1.',
	'editaccount-success-close' => 'Deaktiverte konto $1.',
	'editaccount-error-email' => 'E-post ble ikke endret. Prøv igjen eller kontakt Tech Team.',
	'editaccount-error-pass' => 'Passord ble ikke endret. Prøv igjen eller kontakt Tech Team.',
	'editaccount-error-realname' => 'Virkelig navn ble ikke endret. Prøv igjen eller kontakt Tech Team.',
	'editaccount-error-close' => 'Et problem oppsto under lukking av kontoen. Prøv igjen eller kontakt Tech Team.',
	'editaccount-invalid-email' => '«$1» er ikke en gyldig e-postadresse!',
	'editaccount-nouser' => 'Kontoen «$1» finnes ikke!',
	'editaccount-remove-avatar-fail' => 'Problem med automatisk fjerning av avatar.',
	'editaccount-requested' => 'Merk: Brukeren har søkt om å få kontoen sin stengt',
	'editaccount-not-requested' => 'FORSIKTIG: Brukeren har ikke søkt om å få kontoen sin stengt',
	'editaccount-labal-account-status' => 'Kontostatus',
	'editaccount-labal-email-status' => 'E-poststatus',
	'editaccount-status-confirmed' => 'Bekreftet',
	'editaccount-status-unconfirmed' => 'Ubekreftet',
	'editaccount-status-realuser' => 'Virkelig bruker',
	'editaccount-status-tempuser' => 'Midlertidig bruker',
	'editaccount-error-tempuser-email' => 'Midlertidige brukere kan ikke ha et tomt e-postadressefelt, vennligst oppgi en e-postadresse.',
	'editaccount-email-change-requested' => 'Brukerforespurt e-postbytte via Innstillinger til $1. For å bekrefte det forespurte e-postadressebyttet for brukeren, skriv den forespurte e-postadressen inn i feltet under og trykk «Lagre og bekreft.»',
	'editaccount-log' => 'Brukerkontologg',
	'editaccount-log-header' => 'Denne siden lister opp endringer gjort på brukerinnstillinger av Wikia Staff.',
	'editaccount-log-entry-email' => 'endret e-post for bruker $2',
	'editaccount-log-entry-pass' => 'endret passord for bruker $2',
	'editaccount-log-entry-realname' => 'endret virkelig navn for bruker $2',
	'editaccount-log-entry-close' => 'deaktiverte konto $2',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;">Denne kontoen har blitt deaktivert globalt av Wikia.</div>',
	'right-editaccount' => 'Rediger andre brukeres innstillinger',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 * @author Tjcool007
 */
$messages['nl'] = array(
	'editaccount' => 'Gebruiker bewerken',
	'editaccount-desc' => 'Stelt stafleden in staat gebruikersinformatie te beheren',
	'editaccount-title' => 'Gebruiker bewerken',
	'editaccount-frame-manage' => 'Gebruiker bewerken',
	'editaccount-frame-usage' => 'Let op',
	'editaccount-usage' => 'Gebruikersgevens worden voor iedere wiki apart in een cache bijgehouden.
Als u een wachtwoord of e-mailadres opnieuw instelt, wordt alleen de cache voor deze wiki ongeldig gemaakt.
Laat de gebruiker bij deze wiki aanmelden met een nieuw wachtwoord om problemen met de cache te voorkomen.',
	'editaccount-label-select' => 'Selecteer een gebruiker',
	'editaccount-submit-account' => 'Gebruiker beheren',
	'editaccount-frame-account' => 'Te bewerken gebruiker: $1',
	'editaccount-frame-close' => 'Te sluiten gebruiker: $1',
	'editaccount-label-email' => 'Nieuwe e-mailadres instellen',
	'editaccount-label-pass' => 'Nieuw wachtwoord instellen',
	'editaccount-label-realname' => 'Nieuwe echte naam instellen',
	'editaccount-label-clearunsub' => 'Uitgeschreven',
	'editaccount-submit-email' => 'E-mailadres opslaan',
	'editaccount-submit-pass' => 'Wachtwoord opslaan',
	'editaccount-submit-realname' => 'Echte naam opslaan',
	'editaccount-submit-clearunsub' => 'Uitschrijven leegmaken',
	'editaccount-submit-cleardisable' => 'Gebruiker weer vrijgeven',
	'editaccount-submit-close' => 'Gebruiker afsluiten',
	'editaccount-usage-close' => 'U kunt een gebruiker ook uitschakelen door een onbekend wachtwoord in te stellen en het e-mailadres te verwijderen.
De huidige gegevens gaan dan verloren en zijn niet te herstellen.',
	'editaccount-warning-close' => '<b>Let op!</b>
U staat op het punt de gebruiker <b>$1</b> permanent af te sluiten.
Dit kan niet ongedaan gemaakt worden.
Weet u zeker dat u dit wilt doen?',
	'editaccount-status' => 'Statusbericht',
	'editaccount-success-email' => 'Het e-mailadres voor gebruiker $1 is gewijzigd naar $2.',
	'editaccount-success-email-blank' => 'Het e-mailadres voor $1 is verwijderd.',
	'editaccount-success-pass' => 'Het wachtwoord voor gebruiker $1 is gewijzigd.',
	'editaccount-success-realname' => 'De echte naam voor gebruiker $1 is gewijzigd.',
	'editaccount-success-unsub' => 'De gebruiker $1 is niet langer uitgeschreven.',
	'editaccount-success-disable' => 'De gebruiker $1 is weer vrijgegeven.',
	'editaccount-success-close' => 'De gebruiker $1 is uitgeschakeld.',
	'editaccount-error-email' => 'Het e-mailadres is niet gewijzigd.
Probeer het opnieuw of neem contact op het met Tech Team.',
	'editaccount-error-pass' => 'Het wachtwoord is niet gewijzigd.
Probeer het opnieuw of neem contact op met het Tech Team.',
	'editaccount-error-realname' => 'De echte naam is niet gewijzigd.
Probeer het opnieuw of neem contact op met het Tech Team.',
	'editaccount-error-close' => 'Er is een probleem ontstaan bij het afsluiten van de gebruiker.
Probeer het opnieuw of neem contact op met het Tech Team.',
	'editaccount-invalid-email' => '"$1" is geen geldig e-mailadres.',
	'editaccount-nouser' => 'De gebruiker "$1" bestaat niet.',
	'editaccount-remove-avatar-fail' => 'Er is een probleem opgetreden tijdens het automatisch verwijderen van de avatar.',
	'editaccount-requested' => 'Opmerking: gebruiker heeft een rekeningsluiting aangevraagd',
	'editaccount-not-requested' => 'Waarschuwing: gebruiker heeft geen rekeningsluiting aangevraagd',
	'editaccount-labal-account-status' => 'Gebruikersstatus',
	'editaccount-labal-email-status' => 'E-mailadresstatus',
	'editaccount-status-confirmed' => 'Bevestigd',
	'editaccount-status-unconfirmed' => 'Niet bevestigd',
	'editaccount-status-realuser' => 'Echte gebruiker',
	'editaccount-status-tempuser' => 'Tijdelijke gebruiker',
	'editaccount-error-tempuser-email' => 'Tijdelijke gebruikers moeten een e-mailadres opgeven. Geef een e-mailadres op.',
	'editaccount-email-change-requested' => 'De gebruiker heeft via de voorkeuren een wijziging van het e-mailadres naar $1 aangevraagd. Voer het aangevraagde e-mailadres in het onderstaande veld in en klik op "Opslaan en bevestigen" om de gevraagde wijziging te bevestigen.',
	'editaccount-log' => 'Logboek gebruikers',
	'editaccount-log-header' => 'Op deze pagina staan wijzigingen in gebruikersvoorkeuren die door stafleden van Wikia zijn gemaakt.',
	'editaccount-log-entry-email' => 'heeft het e-mailadres voor gebruiker $2 aangepast',
	'editaccount-log-entry-pass' => 'heeft het wachtwoord voor gebruiker $2 aangepast',
	'editaccount-log-entry-realname' => 'heeft de echte naam voor gebruiker $2 aangepast',
	'editaccount-log-entry-close' => 'heeft gebruiker $2 uitgeschakeld',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;">Deze gebruiker is globaal uitgeschakeld door Wikia.</div>',
	'right-editaccount' => 'Voorkeuren van gebruikers bewerken',
);

/** ‪Nederlands (informeel)‬ (‪Nederlands (informeel)‬)
 * @author Siebrand
 */
$messages['nl-informal'] = array(
	'editaccount-usage' => 'Gebruikersgevens worden voor iedere wiki apart in een cache bijgehouden.
Als je een wachtwoord of e-mailadres opnieuw instelt, wordt alleen de cache voor deze wiki ongeldig gemaakt.
Laat de gebruiker bij deze wiki aanmelden met een nieuw wachtwoord om problemen met de cache te voorkomen.',
	'editaccount-usage-close' => 'Je kunt een gebruiker ook uitschakelen door een onbekend wachtwoord in te stellen en het e-mailadres te verwijderen.
De huidige gegevens gaan dan verloren en zijn niet te herstellen.',
	'editaccount-warning-close' => '<b>Let op!</b>
Je staat op het punt de gebruiker <b>$1</b> permanent af te sluiten.
Dit kan niet ongedaan gemaakt worden.
Weet je zeker dat u dit wilt doen?',
);

/** Punjabi (ਪੰਜਾਬੀ)
 * @author Aalam
 */
$messages['pa'] = array(
	'editaccount' => 'ਅਕਾਊਂਟ ਸੋਧ',
	'editaccount-desc' => 'ਸਟਾਫ਼ ਮੈਂਬਰ ਨੂੰ ਯੂਜ਼ਰ ਅਕਾਊਂਟ ਜਾਣਕਾਰੀ ਪਰਬੰਧ ਕਰਨ ਦਿਉ',
	'editaccount-frame-manage' => 'ਅਕਾਊਂਟ ਸੋਧੋ',
	'editaccount-frame-usage' => 'ਨੋਟ',
	'editaccount-label-select' => 'ਯੂਜ਼ਰ ਅਕਾਊਂਟ ਚੁਣੋ',
	'editaccount-submit-account' => 'ਅਕਾਊਂਟ ਪਰਬੰਧ',
	'editaccount-frame-account' => 'ਯੂਜ਼ਰ ਅਕਾਊਂਟ ਸੋਧ ਜਾਰੀ: $1',
	'editaccount-label-email' => 'ਨਵਾਂ ਈਮੇਲ ਐਡਰੈੱਸ ਸੈੱਟ ਕਰੋ',
	'editaccount-label-pass' => 'ਨਵਾਂ ਪਾਸਵਰਡ ਸੈੱਟ ਕਰੋ',
	'editaccount-label-realname' => 'ਨਵਾਂ ਅਸਲੀ ਨਾਂ ਸੈੱਟ ਕਰੋ',
	'editaccount-submit-email' => 'ਈਮੇਲ ਐਡਰੈੱਸ ਸੰਭਾਲੋ',
	'editaccount-submit-pass' => 'ਪਾਸਵਰਡ ਸੰਭਾਲੋ',
	'editaccount-submit-realname' => 'ਅਸਲੀ ਨਾਂ ਸੰਭਾਲੋ',
);

/** Polish (Polski)
 * @author BeginaFelicysym
 * @author Sovq
 * @author Woytecr
 */
$messages['pl'] = array(
	'editaccount' => 'Edytuj konto',
	'editaccount-desc' => 'Pozwala zmienić informacje o koncie użytkownika',
	'editaccount-title' => 'Special:EditAccount',
	'editaccount-frame-manage' => 'Edytuj konto',
	'editaccount-frame-usage' => 'Komentarz',
	'editaccount-usage' => 'Dane użytkownika przechowywane są osobno na każdej wiki. Kiedy resetujesz hasło lub e-mai, pamięć podręczna zostanie odświeżona tylko na danej wiki. Proszę skieruj użytkownika do tej wiki aby zalogował się nowym hasłem, aby uniknąć kłopotów z pamięcią podręczną.',
	'editaccount-label-select' => 'Wybierz konto użytkownika',
	'editaccount-submit-account' => 'Zarządzanie kontem',
	'editaccount-frame-account' => 'Edycja konta użytkownika:$1',
	'editaccount-frame-close' => 'Wyłącz konto użytkownika: $1',
	'editaccount-label-email' => 'Ustaw nowy adres e-mail',
	'editaccount-label-pass' => 'Ustaw nowe hasło',
	'editaccount-label-realname' => 'Ustaw nowe nazwisko',
	'editaccount-label-clearunsub' => 'Zakończono subskrypcję',
	'editaccount-submit-email' => 'Zapisz adres e-mail',
	'editaccount-submit-pass' => 'Zapisz hasło',
	'editaccount-submit-realname' => 'Zapisz nazwisko',
	'editaccount-submit-clearunsub' => 'Wyczyść subskrypcję',
	'editaccount-submit-cleardisable' => 'Wyczyść wyłączenie konta',
	'editaccount-submit-close' => 'Zamknij konto',
	'editaccount-usage-close' => 'Możesz także wyłączyć konto użytkownika poprzez zmianę jego hasło i usunięcie adresu e-mail. Dane zostaną utracone bez możliwości ich odzyskania.',
	'editaccount-warning-close' => '<b>Uwaga!</b> Zamierzasz trwale wyłączyć konto użytkownika <b>$1</b>. Tej zmiany nie można cofnąć. Jesteś pewien?',
	'editaccount-status' => 'Komunikat o stanie',
	'editaccount-success-email' => 'Pomyślnie zmieniono adres e-mail konta $1 na $2.',
	'editaccount-success-email-blank' => 'Pomyślnie usunięto adres e-mail konta  $1.',
	'editaccount-success-pass' => 'Pomyślnie zmieniono hasło dla konta  $1 .',
	'editaccount-success-realname' => 'Pomyślnie zmieniono nazwisko dla konta $1.',
	'editaccount-success-unsub' => 'Pomyślnie usunięto ustawienia subskrypcji dla konta $1.',
	'editaccount-success-disable' => 'Pomyślnie usunięto ustawienia wyłączenia konta $1.',
	'editaccount-success-close' => 'Pomyślnie wyłączono konto $1.',
	'editaccount-error-email' => 'Adres e-mail nie został zmieniony. Spróbuj ponownie lub skontaktuj się z zespołem technicznym.',
	'editaccount-error-pass' => 'Hasło nie zostało zmienione. Spróbuj ponownie lub skontaktuj się z zespołem technicznym.',
	'editaccount-error-realname' => 'Nazwisko nie zostało zmienione. Spróbuj ponownie lub skontaktuj się z zespołem technicznym.',
	'editaccount-error-close' => 'Wystąpił błąd podczas zamykania konta. Spróbuj ponownie lub skontaktuj się z zespołem technicznym.',
	'editaccount-invalid-email' => '"$1" nie jest prawidłowym adresem e-mail!',
	'editaccount-nouser' => 'Konto "$1" nie istnieje!',
	'editaccount-remove-avatar-fail' => 'Wystąpił błąd podczas usuwania awataru.',
	'editaccount-requested' => 'Uwaga: Użytkownik poprosił o zamknięcia konta',
	'editaccount-not-requested' => 'UWAGA: Użytkownik nie prosił o zamknięcia konta',
	'editaccount-labal-account-status' => 'Stan konta',
	'editaccount-labal-email-status' => 'Stan wiadomości e-mail',
	'editaccount-status-confirmed' => 'Potwierdzone',
	'editaccount-status-unconfirmed' => 'Niepotwierdzone',
	'editaccount-status-realuser' => 'Rzeczywisty użytkownik',
	'editaccount-status-tempuser' => 'Tymczasowy użytkownik',
	'editaccount-error-tempuser-email' => 'Tymczasowi użytkownicy nie mogą mieć pustego pola adresu e-mail, wprowadź adres e-mail.',
	'editaccount-email-change-requested' => "Użytkownik prosił o zmianę adresu e-mail za pomocą preferencji  $1. Aby potwierdzić zmianę adresu e-mail żądaną dla użytkownika, wprowadź żądany adres w polu poniżej i kliknij przycisk ''Zapisz i potwierdź.''",
	'editaccount-log' => 'Rejestr kont użytkownika',
	'editaccount-log-header' => 'Ta strona zawiera listę zmian informacji o użytkowniku dokonanych przez pracowników.',
	'editaccount-log-entry-email' => 'zmieniono e-mail użytkownika $2',
	'editaccount-log-entry-pass' => 'zmieniono hasło użytkownika $2',
	'editaccount-log-entry-realname' => 'zmieniono nazwisko użytkownika $2',
	'editaccount-log-entry-close' => 'wyłączono konto $2',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;">To konto zostało wyłączone globalnie przez Wikię.</div>',
	'right-editaccount' => 'Edycja informacji innych użytkowników',
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'editaccount' => 'Modìfica Cont',
	'editaccount-desc' => "A përmet ai mèmber ëd l'echip ëd gestì j'anformassion dël cont ëd l'utent",
	'editaccount-title' => 'Special:EditAccount',
	'editaccount-frame-manage' => 'Modìfica un cont',
	'editaccount-frame-usage' => 'Nòta',
	'editaccount-usage' => "Ij dat utent a son butà an memòria local separatament për minca wiki. Quand ch'a ampòsta torna na ciav o n'adrëssa ëd pòsta eletrònica, la memòria local a sarà anulà mach për cola wiki. Për piasì ch'a adressa l'utent a cola wiki-là për intré con la neuva ciav për evité problema ëd memòria local.",
	'editaccount-label-select' => 'Selession-a un cont utent',
	'editaccount-submit-account' => 'Gestiss Cont',
	'editaccount-frame-account' => 'Modifiché cont utent: $1',
	'editaccount-frame-close' => 'Disabilité ël cont utent: $1',
	'editaccount-label-email' => 'Buté na neuva adrëssa ëd pòsta eletrònica',
	'editaccount-label-pass' => 'Ampòsta neuva ciav',
	'editaccount-label-realname' => 'Ampòsta neuv nòm ver',
	'editaccount-label-clearunsub' => "Anulà l'abonament",
	'editaccount-submit-email' => "Salvé l'adrëssa ëd pòsta eletrònica",
	'editaccount-submit-pass' => 'Salva Ciav',
	'editaccount-submit-realname' => 'Salva Nòm Ver',
	'editaccount-submit-clearunsub' => "Scancelé l'anulament ëd l'abonament",
	'editaccount-submit-cleardisable' => 'Gavé la marca ëd disabilitassion',
	'editaccount-submit-close' => 'Sara Cont',
	'editaccount-usage-close' => "A peul ëdcò disabilité a un cont utent an cripté soa ciav e gavand soa adrëssa ëd pòsta eletrònica. Ch'a fasa atension che sto dat a l'é përdù e a l'é pa arcuperàbil.",
	'editaccount-warning-close' => "<b>Atension!</b> A l'é an camin ch'a disabìlita për sempe ël cont ëd l'utent <b>$1</b>. As peul pa torné andré. É-lo sigur ëd vorèj felo?",
	'editaccount-status' => 'Mëssagi dë stat',
	'editaccount-success-email' => "Cambià da bin l'adrëssa ëd pòsta eletrònica për ël cont $1 a $2.",
	'editaccount-success-email-blank' => "Gavà da bin l'adrëssa ëd pòsta eletrònica dal cont $1.",
	'editaccount-success-pass' => 'Cambià da bin ciav për ël cont $1.',
	'editaccount-success-realname' => 'Cambià da bin ël nòm ver për ël cont $1.',
	'editaccount-success-unsub' => "Gavà për da bin l'anformassion d'anulament ëd l'abonament për ël cont $1.",
	'editaccount-success-disable' => "Gavà për da bin l'anformassion ëd disabilitassion dal cont $1.",
	'editaccount-success-close' => 'Disabilità da bin ël cont $1.',
	'editaccount-error-email' => "L'adrëssa ëd pòsta eletrònica e l'é pa stàita cambià. Ch'a preuva torna o ch'a contata l'Echip técnica.",
	'editaccount-error-pass' => "La ciav a l'é pa stàita cangià. Ch'a preuva torna o ch'a contata l'Echip técnica.",
	'editaccount-error-realname' => "Ël nòm ver a l'é pa stàit cangià. Ch'a preuva torna o ch'a contata l'Echip Técnica.",
	'editaccount-error-close' => "Un problema a l'é capità an sarand ël cont. Ch'a preuva torna o ch'a contata l'Echip técnica.",
	'editaccount-invalid-email' => '"$1" a l\'é n\'adrëssa ëd pòsta eletrònica pa bon-a!',
	'editaccount-nouser' => 'Cont "$1" a esist pa!',
	'editaccount-remove-avatar-fail' => "Problema an gavand da sol l'avatar.",
	'editaccount-requested' => "Nòta: L'utent a l'ha ciamà ëd saré ël cont",
	'editaccount-not-requested' => "TENSION: L'utent a l'ha pa ciamà ëd saré ël cont",
	'editaccount-log' => 'Registr dël cont utent',
	'editaccount-log-header' => "Sta pàgina-sì a lista ij cangiament fàit ai gust ëd l'utent da l'Echip ëd Wikia.",
	'editaccount-log-entry-email' => "a l'ha cangià l'adrëssa ëd pòsta eletrònica për l'utent $2",
	'editaccount-log-entry-pass' => 'cangià ciav për utent $2',
	'editaccount-log-entry-realname' => 'cangià nòm ver për utent $2',
	'editaccount-log-entry-close' => 'disabilità cont $2',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;">Sto cont-sì a l\'é stàit disabilità globalment da Wikia.</div>',
	'right-editaccount' => "Modifiché ij gust ëd j'àutri utent",
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'editaccount' => 'ګڼون سمول',
	'editaccount-frame-manage' => 'يو ګڼون سمول',
	'editaccount-frame-usage' => 'يادښت',
	'editaccount-label-email' => 'نوې برېښليک پته ټاکل',
	'editaccount-label-pass' => 'نوی پټنوم ټاکل',
	'editaccount-label-realname' => 'نوی اصلي نوم ټاکل',
	'editaccount-submit-email' => 'برېښليک خوندي کول',
	'editaccount-submit-pass' => 'پټنوم خوندي کول',
	'editaccount-submit-close' => 'کارن حساب تړل',
	'editaccount-labal-account-status' => 'د ګڼون دريځ',
);

/** Portuguese (Português)
 * @author Hamilton Abreu
 */
$messages['pt'] = array(
	'editaccount' => 'Editar Conta',
	'editaccount-desc' => 'Permite que os membros da equipa administrem a informação das contas de utilizador',
	'editaccount-title' => 'Special:EditAccount',
	'editaccount-frame-manage' => 'Editar uma conta',
	'editaccount-frame-usage' => 'Nota',
	'editaccount-usage' => 'Os dados do utilizador são mantidos em caches separadas para cada wiki. Ao reiniciar a palavra-chave ou o endereço de correio electrónico, será desfeita somente a cache desta wiki. Para evitar problemas de cache, direccione o utilizador para esta wiki para se autenticar com uma palavra-chave nova.',
	'editaccount-label-select' => 'Seleccione uma conta de utilizador',
	'editaccount-submit-account' => 'Administrar Conta',
	'editaccount-frame-account' => 'A editar a conta: $1',
	'editaccount-frame-close' => 'Desactivar a conta: $1',
	'editaccount-label-email' => 'Definir endereço de correio electrónico novo',
	'editaccount-label-pass' => 'Definir palavra-chave nova',
	'editaccount-label-realname' => 'Definir nome verdadeiro novo',
	'editaccount-label-clearunsub' => 'Não subscrito',
	'editaccount-submit-email' => 'Gravar Correio Electrónico',
	'editaccount-submit-pass' => 'Gravar Palavra-chave',
	'editaccount-submit-realname' => 'Gravar Nome Verdadeiro',
	'editaccount-submit-clearunsub' => 'Limpar indicação de não subscrito',
	'editaccount-submit-close' => 'Fechar Conta',
	'editaccount-usage-close' => 'Também pode desactivar uma conta de utilizador misturando a palavra-chave e removendo o endereço electrónico. Note que estes dados serão perdidos e não podem ser recuperados.',
	'editaccount-warning-close' => '<b>Cuidado!</b> Está prestes a desactivar definitivamente a conta do utilizador <b>$1</b>. Esta operação não pode ser desfeita. Tem a certeza de que pretende fazê-lo?',
	'editaccount-status' => 'Estado',
	'editaccount-success-email' => 'Alterou com sucesso o endereço electrónico da conta $1 para $2.',
	'editaccount-success-email-blank' => 'Removeu com sucesso o endereço electrónico da conta $1.',
	'editaccount-success-pass' => 'Alterou com sucesso a palavra-chave da conta $1.',
	'editaccount-success-realname' => 'Alterou com sucesso o nome verdadeiro da conta $1.',
	'editaccount-success-unsub' => 'O bit de indicação de não subscrito foi removido da conta $1.',
	'editaccount-success-close' => 'Desactivou com sucesso a conta $1.',
	'editaccount-error-email' => 'O endereço electrónico não foi alterado. Tente novamente ou contacte o Suporte Técnico.',
	'editaccount-error-pass' => 'A palavra-chave não foi alterada. Tente novamente ou contacte o Suporte Técnico.',
	'editaccount-error-realname' => 'O nome verdadeiro não foi alterado. Tente novamente ou contacte o Suporte Técnico.',
	'editaccount-error-close' => 'Ocorreu um problema ao fechar a conta. Tente novamente ou contacte o Suporte Técnico.',
	'editaccount-invalid-email' => '"$1" não é um endereço electrónico válido!',
	'editaccount-nouser' => 'A conta "$1" não existe!',
	'editaccount-log' => 'Registo de contas de utilizador',
	'editaccount-log-header' => 'Esta página lista as alterações feitas às suas preferências pela Equipa da Wikia.',
	'editaccount-log-entry-email' => 'alterou o endereço electrónico do utilizador $2',
	'editaccount-log-entry-pass' => 'alterou a palavra-chave do utilizador $2',
	'editaccount-log-entry-realname' => 'alterou o nome verdadeiro do utilizador $2',
	'editaccount-log-entry-close' => 'desactivou a conta $2',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;">Esta conta foi globalmente desactivada pela Wikia.</div>',
	'right-editaccount' => 'Editar as preferências de outros utilizadores',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Giro720
 * @author Jesielt
 */
$messages['pt-br'] = array(
	'editaccount' => 'Editar conta',
	'editaccount-desc' => 'Permite que os membros da equipe administrem a informação das contas de usuário',
	'editaccount-title' => 'Special:EditAccount',
	'editaccount-frame-manage' => 'Editar uma conta',
	'editaccount-frame-usage' => 'Nota',
	'editaccount-usage' => 'Os dados de usuário estão em caches separados para cada wiki. Quando você redefine uma senha ou email, o cache será modificado apenas para essa wiki. Por favor, direcione o usuário de modo a realizar login nessa wiki com a nova senha, para evitar problemas de cache.',
	'editaccount-label-select' => 'Selecione uma conta de usuário',
	'editaccount-submit-account' => 'Administrar Contas',
	'editaccount-frame-account' => 'Editando conta de usuário: $1',
	'editaccount-frame-close' => 'Desabilitar conta de usuário: $1',
	'editaccount-label-email' => 'Definir novo endereço de email',
	'editaccount-label-pass' => 'Definir nova senha',
	'editaccount-label-realname' => 'Definir novo nome real',
	'editaccount-submit-email' => 'Salvar Email',
	'editaccount-submit-pass' => 'Salvar Senha',
	'editaccount-submit-realname' => 'Salvar Nome Real',
	'editaccount-submit-close' => 'Fechar Conta',
	'editaccount-usage-close' => 'Você também pode desabilitar uma conta de usuário mudando sua senha e removendo o endereço de email. Note que esses dados serão perdidos e nunca mais poderão ser recuperados.',
	'editaccount-warning-close' => '<b>Atenção!</b> Você está prestes a desativar permanentemente a conta de usuário <b>$1</b>. Essa ação não poderá ser revertida. Estando ciente disto, você tem certeza de que é isso que deseja fazer?',
	'editaccount-status' => 'Mensagem de status',
	'editaccount-success-email' => 'Email alterado com sucesso para a conta de $1 para $2.',
	'editaccount-success-email-blank' => 'Removeu com sucesso o e-mail da conta $1.',
	'editaccount-success-pass' => 'Senha alterada com sucesso para a conta $1.',
	'editaccount-success-realname' => 'Nome real alterado com sucesso para a conta $1.',
	'editaccount-success-close' => 'Conta $1 desabilitada com sucesso.',
	'editaccount-error-email' => 'O email não foi alterado. Tente novamente ou contate a equipe de apoio (Tech Team).',
	'editaccount-error-pass' => 'A senha não foi alterada. Tente novamente ou contate a equipe de apoio (Tech Team).',
	'editaccount-error-realname' => 'O nome real não foi alterado. Tente novamente ou contate a equipe de apoio (Tech Team).',
	'editaccount-error-close' => 'Ocorreu um problema ao fechar a conta. Tente novamente ou contate a equipe de apoio (Tech Team).',
	'editaccount-invalid-email' => '"$1" não é um endereço de email válido!',
	'editaccount-nouser' => 'A conta "$1" não existe!',
	'editaccount-log' => 'Use o log de contas',
	'editaccount-log-header' => 'Essa página lista mudanças feitas nas preferências de usuário pela equipe do Wikia (Wikia Staff).',
	'editaccount-log-entry-email' => 'email alterado para o usuário $2',
	'editaccount-log-entry-pass' => 'senha alterada para o usuário $2',
	'editaccount-log-entry-realname' => 'nome real alterado para o usuário $2',
	'editaccount-log-entry-close' => 'desabilitada a conta $2',
	'edit-account-closed-flag' => '<div style="border: 1px solid black; padding: 1em">Essa conta foi desabilitada.</div>',
	'right-editaccount' => 'Editar outras preferências de usuário',
);

/** Romanian (Română)
 * @author Stelistcristi
 */
$messages['ro'] = array(
	'editaccount' => 'Modifică contul',
	'editaccount-frame-manage' => 'Modifică un cont',
	'editaccount-label-clearunsub' => 'Dezabonat',
	'editaccount-submit-email' => 'Salvează adresa de e-mail',
	'editaccount-submit-pass' => 'Salvează parola',
	'editaccount-submit-realname' => 'Salvează numele real',
	'editaccount-submit-close' => 'Închide contul',
	'editaccount-status' => 'Mesaj de stare',
);

/** Russian (Русский)
 * @author Eleferen
 * @author Kuzura
 * @author Lockal
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'editaccount' => 'Изменение учётной записи',
	'editaccount-desc' => 'Позволяет управлять учётными записями пользователей',
	'editaccount-title' => 'Special:ИзменениеУчётнойЗаписи',
	'editaccount-frame-manage' => 'Изменение учётной записи',
	'editaccount-frame-usage' => 'Замечание',
	'editaccount-usage' => 'Данные кэшируются отдельно для каждой вики. При сбросе пароля или адреса электронной почты, кэш будет обновлён только для этой вики. Пожалуйста, попросите участника войти в эту вики с новым паролем, чтобы избежать проблем с кэшированием.',
	'editaccount-label-select' => 'Выберите учётную запись участника',
	'editaccount-submit-account' => 'Управление учётной записью',
	'editaccount-frame-account' => 'Изменение учётной записи участника: $1',
	'editaccount-frame-close' => 'Отключение учётной записи участника: $1',
	'editaccount-label-email' => 'Установка нового адреса эл. почты',
	'editaccount-label-pass' => 'Установка нового пароля',
	'editaccount-label-realname' => 'Установка нового настоящего имени',
	'editaccount-label-clearunsub' => 'Отписаться',
	'editaccount-submit-email' => 'Сохранить адрес эл. почты',
	'editaccount-submit-pass' => 'Сохранить пароль',
	'editaccount-submit-realname' => 'Сохранить настоящее имя',
	'editaccount-submit-clearunsub' => 'Снять отказ от подписки',
	'editaccount-submit-cleardisable' => 'Очистить отключённый флаг',
	'editaccount-submit-close' => 'Закрыть учётную запись',
	'editaccount-usage-close' => 'Вы также можете приостановить действие учётной записи, заменив её пароль и удалив адрес электронной почты. Обратите внимание, что эти данные будет невозможно восстановить.',
	'editaccount-warning-close' => '<b>Внимание!</b> Вы собираетесь навсегда отключить учётную запись пользователя <b>$1</b>. Это действие не может быть отменено. Вы уверены, что хотите сделать именно это?',
	'editaccount-status' => 'Статусное сообщение',
	'editaccount-success-email' => 'Адрес эл. почты для учётной записи $1 успешно изменён на $2.',
	'editaccount-success-email-blank' => 'Адрес электронной почты учётной записи $1 успешно удалён.',
	'editaccount-success-pass' => 'Пароль для учётной записи $1 успешно изменён.',
	'editaccount-success-realname' => 'Настоящее имя для учётной записи $1 успешно изменено.',
	'editaccount-success-unsub' => 'Успешно удалена блокировка подписки для учётной записи $1.',
	'editaccount-success-disable' => 'Успешно удалён отключённый бит блокировки для учётной записи  $1 .',
	'editaccount-success-close' => 'Учётная запись $1 успешно отключена.',
	'editaccount-error-email' => 'Адрес эл. почты не был изменён. Попробуйте ещё раз или свяжитесь с технической командой.',
	'editaccount-error-pass' => 'Пароль не был изменён. Попробуйте ещё раз или свяжитесь с технической командой.',
	'editaccount-error-realname' => 'Настоящее имя не было изменено. Попробуйте ещё раз или свяжитесь с технической командой.',
	'editaccount-error-close' => 'Возникла проблема при закрытии учётной записи. Попробуйте ещё раз или свяжитесь с технической командой.',
	'editaccount-invalid-email' => '«$1» не является допустимым адресом электронной почты!',
	'editaccount-nouser' => 'Учётная запись «$1» не существует!',
	'editaccount-remove-avatar-fail' => 'Проблема с перезагрузкой аватара',
	'editaccount-requested' => 'Примечание: участник запросил закрытие учётной записи',
	'editaccount-not-requested' => 'ВНИМАНИЕ: участник не запрашивал закрытие учётной записи',
	'editaccount-labal-account-status' => 'Статус учётной записи',
	'editaccount-labal-email-status' => 'Статус электронной почты',
	'editaccount-status-confirmed' => 'Подтверждено',
	'editaccount-status-unconfirmed' => 'Не подтверждено',
	'editaccount-status-realuser' => 'Реальный участник',
	'editaccount-status-tempuser' => 'Временный участник',
	'editaccount-error-tempuser-email' => 'Временные участники не могут иметь пустое поле адреса электронной почты, пожалуйста, введите адрес электронной почты.',
	'editaccount-email-change-requested' => 'Участник запросил изменения адреса электронной почты через настройки для  $1 . Для подтверждения изменения адреса запрошенной электронной почты для участника, введите требуемый адрес в поле ниже и нажмите кнопку «Сохранить и подтвердить».',
	'editaccount-log' => 'Журнал учётных записей',
	'editaccount-log-header' => 'На этой странице показаны изменения настроек участника, выполненные сотрудниками Викии',
	'editaccount-log-entry-email' => 'изменил адрес эл. почты участника $2',
	'editaccount-log-entry-pass' => 'изменил пароль участника $2',
	'editaccount-log-entry-realname' => 'изменил настоящее имя участника $2',
	'editaccount-log-entry-close' => 'отключил учётную запись $2',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;">Эта учётная запись была отключена на всей Викия.</div>',
	'right-editaccount' => 'Редактировать настройки других участников',
);

/** Sakha (Саха тыла)
 * @author HalanTul
 */
$messages['sah'] = array(
	'editaccount' => 'Бэлиэтэммит ааккын уларытыы',
	'editaccount-desc' => 'Бэлиэтэммит ааттары салайарга аналлаах',
	'editaccount-title' => 'Special:БэлиэтэммитАатыУларытыы',
	'editaccount-frame-manage' => 'Бэлиэтэммит ааты уларытыы',
	'editaccount-frame-usage' => 'Быһаарыы',
	'editaccount-usage' => 'Дааннайдар хас биирдии биикигэ тус туспа кээштэнэллэр. Киирии тылгын уонна электроннай почтаҥ аадырыһын уларыттаххына, ол эрэ биикиҥ кээһиттэн сүтүө. Бука диэн, кыттааччыны саҥа киирии тылынан киирэрин көрдөс.',
	'editaccount-label-select' => 'Кытааччы бэлиэтэммит аатын тал',
	'editaccount-submit-account' => 'Ааты салайыы',
	'editaccount-frame-account' => 'Бэлиэтэммит ааты уларытыы: $1',
	'editaccount-frame-close' => 'Бэлиэтэммит ааты араарыы: $1',
	'editaccount-label-email' => 'Электрон почта саҥа аадырыһын киллэрии',
	'editaccount-label-pass' => 'Саҥа киирии тылы туруоруу',
	'editaccount-label-realname' => 'Саҥа дьиҥнээх ааты суруйуу',
	'editaccount-submit-email' => 'Электрон почтаны бигэргэтии',
	'editaccount-submit-pass' => 'Киирии тылы бигэргэтии',
	'editaccount-submit-realname' => 'Дьиҥнээх ааты бигэргэтии',
	'editaccount-submit-close' => 'Бэлиэтэммит ааты суох оҥоруу',
	'editaccount-warning-close' => '<b>Болҕой!</b> Эн <b>$1</b> диэн ааты букатын сотон эрэҕин. Бу дьайыы төннөрүллэр кыаҕа суох. Инньэ гынаары гынаргын бигэргэтэҕин дуо?',
	'editaccount-status' => 'Турук биллэриитэ',
	'editaccount-success-email-blank' => 'Бэлиэтэммит $1 аат эл. почтата сотулунна.',
	'editaccount-success-pass' => 'Бэлиэтэммит $1 аат киирии тыла уларыйда.',
	'editaccount-success-realname' => 'Бэлиэтэммит $1 аат киһитин дьиҥнээх аата уларыйда.',
	'editaccount-success-close' => 'Бэлиэтэммит $1 аат араарылынна.',
	'editaccount-error-email' => 'Эл. почта уларыйбата. Өссө төгүл боруобалаа, эбэтэр көмөлөһөр сулууспаҕа таҕыс.',
	'editaccount-error-pass' => 'Киирии тыл уларыйбата. Өссө төгүл боруобалаа, эбэтэр көмөлөһөр сулууспаҕа таҕыс.',
	'editaccount-error-realname' => 'Дьиҥнээх аат уларыйбата. Өссө төгүл боруобалаа, эбэтэр көмөлөһөр сулууспаҕа таҕыс.',
	'editaccount-error-close' => 'Бэлиэтэммит ааты сабарга моһуок үөскээтэ. Өссө төгүл боруобалаа эбэтэр көмөлөһөр сулууспаҕа таҕыс.',
	'editaccount-invalid-email' => '«$1» эл. почта аадырыһа буолбатах!',
	'editaccount-nouser' => 'Бэлиэммит «$1» аат суох эбит!',
	'editaccount-log' => 'Ааты бэлиэтиир сурунаал',
	'editaccount-log-header' => 'Бу сирэйгэ Викиа үлэһиттэрэ уларыппыт кыттааччы тус туруоруулара көрдөрүлүннүлэр',
	'editaccount-log-entry-email' => '$2 кыттааччы эл. почтатын уларыппыт',
	'editaccount-log-entry-pass' => '$2 кыттааччы кирии тылын уларыппыт',
	'editaccount-log-entry-realname' => '$2 кыттааччы дьиҥнээх аатын уларыппыт',
	'editaccount-log-entry-close' => '$2 кыттааччы бэлиэтэниитин араарбыт',
	'edit-account-closed-flag' => '<div style="border: 1px solid black; padding: 1em">Бу аат араарыллыбыт.</div>',
	'right-editaccount' => 'Атын кыттааччылар туруорууларын уларытыы',
);

/** Sinhala (සිංහල)
 * @author Singhalawap
 * @author බිඟුවා
 */
$messages['si'] = array(
	'editaccount' => 'ගිණුම සංස්කරණය',
	'editaccount-frame-manage' => 'ගිණුමක් සංස්කරණය',
	'editaccount-frame-usage' => 'සටහන',
	'editaccount-label-email' => 'විද්‍යුත් ලිපිනයන් සකසන්න',
	'editaccount-submit-pass' => 'මුර පදය සුරකින්න',
);

/** Serbian (Cyrillic script) (‪Српски (ћирилица)‬)
 * @author Rancher
 * @author Verlor
 */
$messages['sr-ec'] = array(
	'editaccount' => 'Измена налога',
	'editaccount-frame-manage' => 'Уреди налог',
	'editaccount-frame-usage' => 'Белешка',
	'editaccount-label-select' => 'Изаберите кориснички налог',
	'editaccount-frame-close' => 'Онемогући кориснички налог: $1',
	'editaccount-label-email' => 'Постави нову е-адресу',
	'editaccount-label-pass' => 'Постави нову лозинку',
	'editaccount-label-realname' => 'Унесите право име',
	'editaccount-submit-email' => 'Сачувај е-адресу',
	'editaccount-submit-pass' => 'Сачувај лозинку',
	'editaccount-submit-realname' => 'Сачувај право име',
	'editaccount-submit-close' => 'Затвори налог',
	'editaccount-status' => 'Статусна порука',
	'editaccount-success-email' => 'Е-адреса за налог $1 на $2 је измењена.',
	'editaccount-success-pass' => 'Лозинка за налог $1 је измењена.',
	'editaccount-success-realname' => 'Право име за налог $1 је измењено.',
	'editaccount-success-close' => 'Налог $1 је успешно затворен.',
	'editaccount-invalid-email' => '„$1“ није исправна е-адреса!',
	'editaccount-nouser' => '„$1“ налог не постоји!',
	'editaccount-log' => 'Дневник корисничких налога',
	'editaccount-log-entry-email' => 'е-адреса корисника $2 је измењена',
	'editaccount-log-entry-pass' => 'лозинка корисника $2 је измењена',
	'editaccount-log-entry-realname' => 'право име корисника $2 је измењено',
	'editaccount-log-entry-close' => '$2 налог је затворен',
);

/** Swedish (Svenska)
 * @author Lokal Profil
 * @author Tobulos1
 * @author VickyC
 * @author WikiPhoenix
 */
$messages['sv'] = array(
	'editaccount' => 'Redigera konto',
	'editaccount-desc' => 'Enables staff members to manage user account information',
	'editaccount-title' => 'Special:EditAccount',
	'editaccount-frame-manage' => 'Redigera ett konto',
	'editaccount-frame-usage' => 'Notis',
	'editaccount-usage' => 'Användardata är cachad separat för varje wiki. När du återställer ett lösenord eller en e-post kommer cachen att brytas för endast denna wiki. Vänligen styr användaren till denna wiki för att logga in med ett nybildat lösenord för att undvika cache-problem.',
	'editaccount-label-select' => 'Välj ett användarkonto',
	'editaccount-submit-account' => 'Hantera konto',
	'editaccount-frame-account' => 'Redigerar användarkonto: $1',
	'editaccount-frame-close' => 'Inaktivera användarkonto: $1',
	'editaccount-label-email' => 'Ange ny e-postadress',
	'editaccount-label-pass' => 'Ange nytt lösenord',
	'editaccount-label-realname' => 'Ange ett nytt riktigt namn',
	'editaccount-label-clearunsub' => 'Prenumeration avslutad',
	'editaccount-submit-email' => 'Spara e-postadress',
	'editaccount-submit-pass' => 'Spara lösenord',
	'editaccount-submit-realname' => 'Spara riktigt namn',
	'editaccount-submit-clearunsub' => 'Rensa avprenumerering',
	'editaccount-submit-cleardisable' => 'Rensa inaktiveringsflagga',
	'editaccount-submit-close' => 'Stäng konto',
	'editaccount-usage-close' => 'Du kan också inaktivera ett användarkonto genom att förvränga lösenordet och ta bort e-postadressen. Observera att på detta sätt gåt data förlorad och kommer inte att återvinnas.',
	'editaccount-warning-close' => '<b>Varning!</b> Du håller på att permanent inaktivera kontot för användare <b>$1</b>. Detta kan inte återställas. Är du säker på att det är vad du vill göra?',
	'editaccount-status' => 'Statusmeddelande',
	'editaccount-success-email' => 'Ändrade e-postadressen för kontot $1 till $2.',
	'editaccount-success-email-blank' => 'Tog bort e-postadressen för kontot $1.',
	'editaccount-success-pass' => 'Ändrade lösenordet för kontot $1.',
	'editaccount-success-realname' => 'Ändrade riktigt namn för kontot $1.',
	'editaccount-success-close' => 'Konto $1 har avaktiverats.',
	'editaccount-error-email' => 'E-postadressen ändrades inte. Försök igen eller kontakta Tech Teamet.',
	'editaccount-error-pass' => 'Lösenordet ändrades inte. Försök igen eller kontakta Tech Teamet.',
	'editaccount-error-realname' => 'Riktigt namn ändrades inte. Försök igen eller kontakta Tech Teamet.',
	'editaccount-error-close' => 'Ett problem uppstod när kontot skulle avslutas. Försök igen eller kontakta Tech Teamet.',
	'editaccount-invalid-email' => '"$1" är inte en giltig e-postadress!',
	'editaccount-nouser' => 'Konto "$1" existerar inte!',
	'editaccount-remove-avatar-fail' => 'Problem med att ta bort avatar automatiskt.',
	'editaccount-requested' => 'OBS: Användare har begärt en avslutning av sitt konto',
	'editaccount-not-requested' => 'VARNING: Användaren har inte begärt att få kontot stängt',
	'editaccount-labal-account-status' => 'Kontostatus',
	'editaccount-labal-email-status' => 'E-poststatus',
	'editaccount-status-confirmed' => 'Bekräftad',
	'editaccount-status-unconfirmed' => 'Obekräftad',
	'editaccount-status-realuser' => 'Riktig användare',
	'editaccount-status-tempuser' => 'Tillfällig användare',
	'editaccount-error-tempuser-email' => 'Tillfälliga användare kan inte ha ett tomt fält för e-postadressen, var god ange en e-postadress.',
	'editaccount-email-change-requested' => 'Användaren har begärt ändra e-postadress via Inställningar för  $1 . För att bekräfta begärd förändring av e-postadress för användaren, ange den begärda e-postadressen i fältet nedan och klicka på "Spara och bekräfta".',
	'editaccount-log' => 'Användarkontots log',
	'editaccount-log-header' => 'Denna sida listar förändringar av användarnas inställningar av Wikias personal.',
	'editaccount-log-entry-email' => 'ändrade e-post för användare $2',
	'editaccount-log-entry-pass' => 'ändrade lösenord för användare $2',
	'editaccount-log-entry-realname' => 'ändrade riktigt namn för användare $2',
	'editaccount-log-entry-close' => 'inaktiverade kontot $2',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;">Detta konto har inaktiverat globalt av Wikia.</div>',
	'right-editaccount' => 'Redigera andra användares inställningar',
);

/** Tamil (தமிழ்)
 * @author Mahir78
 * @author TRYPPN
 */
$messages['ta'] = array(
	'editaccount' => 'கணக்கில் மாற்றங்கள் செய்',
	'editaccount-desc' => 'பயனர் கணக்குகளை பற்றிய விவரங்களை எமது பணியாளர்கள் நிர்வகிக்க வசதி செய்யப்பட்டுள்ளது',
	'editaccount-title' => 'சிறப்பு:கணக்கில் மாற்றங்கள் செய்தல்',
	'editaccount-frame-manage' => 'ஒரு கணக்கை தொகு',
	'editaccount-frame-usage' => 'குறிப்பு',
	'editaccount-label-select' => 'ஒரு பயனர் கணக்கை தேர்ந்தெடு',
	'editaccount-submit-account' => 'கணக்கை நிர்வகி',
	'editaccount-frame-account' => 'பயனர் கணக்கு தொகுக்கப்படுகிறது: $1',
	'editaccount-frame-close' => 'பயனர் கணக்கை நிறுத்திவை: $1',
	'editaccount-label-email' => 'புதிய மின்னஞ்சல் முகவரியை செலுத்து',
	'editaccount-label-pass' => 'புதிய கடவுச்சொல்லை செலுத்து',
	'editaccount-label-realname' => 'புதிய சரியான பெயரை உள்ளிடு',
	'editaccount-submit-email' => 'மின்னஞ்சலை சேமி',
	'editaccount-submit-pass' => 'கடவுச்சொல்லை சேமி',
	'editaccount-submit-realname' => 'உண்மையான பெயரை சேமி',
	'editaccount-submit-close' => 'கணக்கை முடுக',
	'editaccount-status' => 'தற்போதைய நிலைமை பற்றிய செய்தி',
	'editaccount-success-email' => 'கணக்கு $1 லிருந்து $2 க்கு மின்னஞ்சல் வெற்றிகரமாக மாற்றப்பட்டது.',
	'editaccount-success-email-blank' => 'கணக்கு $1 க்கான மின்னஞ்சல் வெற்றிகரமாக நீக்கப்பட்டது',
	'editaccount-success-pass' => 'கணக்கு $1க்கான கடவுச்சொல் வெற்றிகரமாக மாற்றப்பட்டது',
	'editaccount-success-realname' => 'கணக்கு $1க்கான உண்மையான பெயர் வெற்றிகரமாக மாற்றப்பட்டது',
	'editaccount-success-close' => '$1 இந்த கணக்கை வெற்றிகரமாக செயலிழக்கச் செய்யப்பட்டுள்ளது.',
	'editaccount-error-email' => 'மின்னஞ்சல் மாற்றப்படவில்லை. மீண்டும் முயற்சிக்கவும் அல்லது தொழில்நுட்ப குழுவை அனுகவும்.',
	'editaccount-error-pass' => 'கடவுச்சொல் மாற்றப்படவில்லை. மீண்டும் முயற்சிக்கவும் அல்லது தொழில்நுட்ப குழுவை அனுகவும்.',
	'editaccount-error-realname' => 'உண்மையான பெயர் மாற்றப்படவில்லை. மீண்டும் முயற்சிக்கவும் அல்லது தொழில்நுட்ப குழுவை அனுகவும்.',
	'editaccount-error-close' => 'கணக்கு மூடும்போது ஒரு பிரச்சினை உள்ளது. மீண்டும் முயற்சிக்கவும் அல்லது தொழில்நுட்ப குழுவை அனுகவும்',
	'editaccount-invalid-email' => '"$1" சரியான மின்னஞ்சல் இல்லை!',
	'editaccount-nouser' => '"$1" - அப்படியொரு கணக்கு இல்லை!',
	'editaccount-log' => 'பயனர் கணக்கு log',
	'editaccount-log-header' => 'இந்தப் பக்கம் விக்கியா அலுவலரால் மாற்றப்பட்ட பயனர் விருப்பத்தேர்வுகள் பட்டியல்கள்.',
	'editaccount-log-entry-email' => 'பயனர் $2 க்கான மின்னஞ்சல் மாற்றப்பட்டது',
	'editaccount-log-entry-pass' => 'பயனர் $2 க்கான கடவுச்சொல் மாற்றப்பட்டது',
	'editaccount-log-entry-realname' => 'பயனர் $2க்கான உண்மையான பெயர் மாற்றப்பட்டது',
	'editaccount-log-entry-close' => 'செயலிழந்த கணக்கு $2',
	'right-editaccount' => 'ஏனைய பயனர் விருப்பத்தேர்வுகளை தொகு',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'editaccount-frame-usage' => 'గమనిక',
	'editaccount-status' => 'స్థితి సందేశం',
	'editaccount-invalid-email' => '"$1" అనేది సరైన ఈ-మెయిలు చిరునామా కాదు!',
	'editaccount-nouser' => '"$1" అనే ఖాతా లేనే లేదు!',
	'editaccount-log' => 'వాడుకరి ఖాతాల చిట్టా',
	'edit-account-closed-flag' => '<div style="border: 1px solid black; padding: 1em">ఈ ఖాతాని అచేతనం చేసారు.</div>',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'editaccount' => 'Baguhin ang Akawnt',
	'editaccount-desc' => 'Nagpapahintulot sa mga kasaping tauhan na pamahalaan ang kabatiran ng akawnt ng tagagamit',
	'editaccount-title' => 'Natatangi:BaguhinangAkawnt',
	'editaccount-frame-manage' => 'Baguhin ang isang akawnt',
	'editaccount-frame-usage' => 'Tala',
	'editaccount-usage' => 'Nakahiwalay ang pagkakatago ng dato ng tagagamit para sa bawat wiki.  Kapag muli mong itinakda ang hudyat o e-liham, masisira ang taguan para sa wiking ito lamang.  Mangyari ituro ang tagagamit sa wiking ito upang lumagda na may isang bagong takdang hudyat upang maiwasan ang mga paksa na pangtaguan.',
	'editaccount-label-select' => 'Pumili ng isang akawnt ng tagagamit',
	'editaccount-submit-account' => 'Pamahalaan ang Akawnt',
	'editaccount-frame-account' => 'Binabago ang akawnt ng tagagamit na: $1',
	'editaccount-frame-close' => 'Huwag nang paganahin ang akawnt ng tagagamit na: $1',
	'editaccount-label-email' => 'Itakda ang bagong tirahan ng e-liham',
	'editaccount-label-pass' => 'Magtakda ng bagong hudyat',
	'editaccount-label-realname' => 'Itakda ang bagong tunay na pangalan',
	'editaccount-submit-email' => 'Sagipin ang E-Liham',
	'editaccount-submit-pass' => 'Sagipin ang Hudyat',
	'editaccount-submit-realname' => 'Sagipin ang Tunay na Pangalan',
	'editaccount-submit-close' => 'Isara ang Akawnt',
	'editaccount-usage-close' => 'Maaari mo ring huwag paandarin ang isang akawnt ng tagagamit sa pamamagitan ng paggulo sa hudyat at pagtanggal ng tirahan ng e-liham.  Unawaing mawawala na ang datong ito at hindi na maibabalik pa.',
	'editaccount-warning-close' => '<b>Mag-ingat!</b> Pananatilihin mo nang hindi pagaganahin ang akawnt ng tagagamit na si <b>$1</b>.  Hindi na ito maibabalik pa.  Talaga bang ito ang nais mong gawin?',
	'editaccount-status' => 'Mensahe ng katayuan',
	'editaccount-success-email' => 'Matagumpay na nabago ang e-liham para sa akawnt na $1 papuntang $2.',
	'editaccount-success-email-blank' => 'Matagumpay na natanggal ang e-liham mula sa akawnt na $1.',
	'editaccount-success-pass' => 'Matagumpay na nabago ang hudyat para sa akawnt na $1.',
	'editaccount-success-realname' => 'Matagumpay na nabago ang tunay na pangalan para sa akawnt na $1.',
	'editaccount-success-close' => 'Matagumpay na hindi pinagana ang akawnt na $1.',
	'editaccount-error-email' => 'Hindi binago ang e-liham.  Subukan uli o makipag-ugnayan sa Pangkat ng Tek.',
	'editaccount-error-pass' => 'Hindi nabago ang hudyat. Subukan uli o makipag-ugnayan sa Pangkat ng Tek.',
	'editaccount-error-realname' => 'Hindi nabago ang tunay na pangalan.  Subukan uli o makipag-ugnayan sa Pangkat ng Tek.',
	'editaccount-error-close' => 'Naganap ang isang suliranin habang sinasara ang akawnt.  Subukan uli o makipag-ugnayan sa Pangkat ng Tek.',
	'editaccount-invalid-email' => 'Ang "$1" ay hindi isang tanggap na tirahan ng e-liham!',
	'editaccount-nouser' => 'Hindi umiiral ang akawnt na "$1"!',
	'editaccount-log' => 'Talaan ng mga akawnt ng tagagamit',
	'editaccount-log-header' => 'Nagtatala ang pahinang ito ng mga pagbabagong ginawa ng Mga Tauhan ng Wikia sa mga nais ng tagagamit.',
	'editaccount-log-entry-email' => 'binago ang e-liham para sa tagagamit na $2',
	'editaccount-log-entry-pass' => 'binago ang hudyat para sa tagagamit na $2',
	'editaccount-log-entry-realname' => 'binago ang tunay na pangalan para sa tagagamit na $2',
	'editaccount-log-entry-close' => 'hindi pinagana ang akawnt na $2',
	'edit-account-closed-flag' => '<div style="border: 1px solid black; padding: 1em">Hindi na pinagagana ang akawnt na ito.</div>',
	'right-editaccount' => 'Baguhin ang mga nais ng iba pang mga tagagamit',
);

/** Turkish (Türkçe)
 * @author Suelnur
 */
$messages['tr'] = array(
	'editaccount-submit-close' => 'Hesabı kapat',
	'edit-account-closed-flag' => '<div style="border: 1px solid black; padding: 1em">Bu hesap devre dışı bırakıldı.</div>',
);

/** Tatar (Cyrillic script) (Татарча)
 * @author Ajdar
 */
$messages['tt-cyrl'] = array(
	'editaccount' => 'Хисап язмасын төзәтү',
);

/** Ukrainian (Українська)
 * @author A1
 * @author Prima klasy4na
 */
$messages['uk'] = array(
	'editaccount' => 'Редагувати обліковий запис',
	'editaccount-desc' => 'Дозволяє керувати обліковими записами користувачів',
	'editaccount-title' => 'Special:EditAccount',
	'editaccount-frame-manage' => 'Редагувати обліковий запис',
	'editaccount-frame-usage' => 'Примітка',
	'editaccount-label-select' => 'Оберіть обліковий запис користувача',
	'editaccount-submit-account' => 'Керування обліковим записом',
	'editaccount-frame-account' => 'Редагування облікового запису: $1',
	'editaccount-frame-close' => 'Відключення облікового запису користувача: $1',
	'editaccount-label-email' => 'Встановити адресу електронної пошти',
	'editaccount-label-pass' => 'Встановити пароль',
	'editaccount-label-realname' => "Встановити справжнє ім'я",
	'editaccount-label-clearunsub' => 'Відписатися',
	'editaccount-submit-email' => 'Зберегти адресу електронної пошти',
	'editaccount-submit-pass' => 'Зберегти пароль',
	'editaccount-submit-realname' => "Зберегти справжнє ім'я",
	'editaccount-submit-close' => 'Закрити обліковий запис',
	'editaccount-status' => 'Статусне повідомлення',
	'editaccount-success-email' => 'Адресу електронної пошти для облікового запису $1 змінено на $2.',
	'editaccount-success-email-blank' => 'Адресу електронної пошти для облікового запису $1 вилучено',
	'editaccount-success-pass' => 'Пароль для облікового запису $1 змінено.',
	'editaccount-success-realname' => "Справжнє ім'я для облікового запису $1 змінено.",
	'editaccount-error-pass' => 'Пароль не було змінено. Повторіть спробу або зверніться до технічної підтримки.',
	'editaccount-error-realname' => "Справжнє ім'я не було змінено. Повторіть спробу або зверніться до технічної підтримки.",
	'editaccount-error-close' => 'Сталася помилка під час закриття облікового запису. Повторіть спробу або зверніться до технічної підтримки.',
	'editaccount-invalid-email' => '" $1 " не є адресою електронної пошти!',
	'editaccount-nouser' => 'Обліковий запис " $1 " не існує!',
	'editaccount-remove-avatar-fail' => 'Проблеми автоматичного видалення аватари.',
	'editaccount-requested' => 'Примітка: Користувач запросив закриття облікового запису',
	'editaccount-not-requested' => 'Увага: Користувач не запрошував закриття рахунку',
	'editaccount-labal-account-status' => 'Статус облікового запису',
	'editaccount-labal-email-status' => 'Статус електронної пошти',
	'editaccount-status-confirmed' => 'Підтверджено',
	'editaccount-status-unconfirmed' => 'Непідтверджений',
	'editaccount-status-tempuser' => 'Тимчасовий користувач',
	'editaccount-error-tempuser-email' => 'Тимчасові користувачі не можуть мати порожнє поле адреси електронної пошти, будь ласка, введіть адресу електронної пошти.',
	'editaccount-email-change-requested' => 'Користувач зробив запит зміни адреси електронної пошти через налаштування для  $1 . Щоб підтвердити зміну адреси електронної пошти, введіть запитану електронну адресу в поле нижче і натисніть кнопку "Зберегти і підтвердити".',
	'editaccount-log' => 'Журнал облікових записів',
	'editaccount-log-entry-email' => 'змінив адресу електронної пошти для користувача $2',
	'editaccount-log-entry-pass' => 'змінив пароль для користувача $2',
	'editaccount-log-entry-realname' => "змінено справжнє ім'я користувача $2",
	'editaccount-log-entry-close' => 'вимкнено обліковий запис $2',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;">Цей обліковий запис відключений глобально на Wikia.</div>',
	'right-editaccount' => 'Редагувати інформацію інших користувачів',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Xiao Qiao
 */
$messages['vi'] = array(
	'editaccount' => 'Sửa đổi tài khoản',
	'editaccount-desc' => 'Cho phép nhân viên quản lý thông tin tài khoản người dùng',
	'editaccount-title' => 'Đặc biệt:EditAccount',
	'editaccount-frame-manage' => 'Sửa đổi tài khoản',
	'editaccount-frame-usage' => 'Lưu ý',
	'editaccount-label-select' => 'Chọn một tài khoản người dùng',
	'editaccount-submit-account' => 'Quản lý tài khoản',
	'editaccount-frame-account' => 'Sửa đổi tài khoản người dùng: $1',
	'editaccount-frame-close' => 'Vô hiệu hóa tài khoản người dùng: $1',
	'editaccount-label-email' => 'Thiết lập địa chỉ e-mail mới',
	'editaccount-label-pass' => 'Thiết lập mật khẩu mới',
	'editaccount-label-realname' => 'Cung cấp tên thật',
	'editaccount-label-clearunsub' => 'Hủy đăng ký',
	'editaccount-submit-email' => 'Lưu địa chỉ e-mail',
	'editaccount-submit-pass' => 'Lưu mật khẩu',
	'editaccount-submit-realname' => 'Lưu tên thật',
	'editaccount-submit-clearunsub' => 'Xoá bỏ đăng ký',
	'editaccount-submit-close' => 'Đóng tài khoản',
	'editaccount-usage-close' => 'Bạn cũng có thể vô hiệu hóa một tài khoản người dùng bằng cách xáo trộn mật khẩu và loại bỏ các địa chỉ e-mail. Lưu ý rằng dữ liệu này bị mất và sẽ không được khôi phục.',
	'editaccount-warning-close' => '<b>Thận trọng!</b> Bạn đang định vô hiệu hóa vĩnh viễn tài khoản của người dùng <b>$1</b>. Điều này không thể quay trở lại được. Bạn có chắc chắn đó là những gì bạn muốn làm?',
	'editaccount-status' => 'Thông điệp trạng thái',
	'editaccount-success-email' => 'Thay đổi thành công địa chỉ e-mail cho tài khoản $1 đến $2 .',
	'editaccount-success-email-blank' => 'Thành công gỡ bỏ địa chỉ thư điện tử cho tài khoản $1.',
	'editaccount-success-pass' => 'Thay đổi thành công mật khẩu cho tài khoản $1 .',
	'editaccount-success-realname' => 'Thay đổi thành công tên thật cho tài khoản $1 .',
	'editaccount-success-unsub' => 'Thành công hủy bỏ nhỏ đăng ký cho tài khoản $1 .',
	'editaccount-success-close' => 'Thành công vô hiệu hóa tài khoản $1 .',
	'editaccount-error-email' => 'E-mail không được thay đổi. Thử lại hoặc liên hệ với đội ngũ công nghệ cao.',
	'editaccount-error-pass' => 'Mật khẩu không được thay đổi. Thử lại hoặc liên hệ với đội ngũ công nghệ cao.',
	'editaccount-error-realname' => 'Tên thật không thay đổi. Thử lại hoặc liên hệ với đội ngũ công nghệ cao.',
	'editaccount-error-close' => 'Một vấn đề xảy ra khi đóng tài khoản. Thử lại hoặc liên hệ với đội ngũ công nghệ cao.',
	'editaccount-invalid-email' => '"$1" không phải là một địa chỉ thư điện tử hợp lệ!',
	'editaccount-nouser' => 'Tài khoản "$1" không tồn tại!',
	'editaccount-log' => 'Nhật trình Tài khoản người dùng',
	'editaccount-log-header' => 'Trang này liệt kê những thay đổi thông tin người dùng được thực hiện bởi Nhân viên Wikia',
	'editaccount-log-entry-email' => 'thư điện tử đã thay đổi cho người dùng $2',
	'editaccount-log-entry-pass' => 'đã thay đổi mật khẩu cho người dùng $2',
	'editaccount-log-entry-realname' => 'đã thay đổi tên thật cho người dùng $2',
	'editaccount-log-entry-close' => 'vô hiệu hóa tài khoản $2',
	'edit-account-closed-flag' => '<div class="errorbox" style="padding: 1em;">Tài khoản này đã bị vô hiệu hoá trên toàn cầu bởi Wikia.</div>',
	'right-editaccount' => 'Sửa đổi thông tin người dùng khác',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Anakmalaysia
 * @author Dimension
 * @author Hydra
 * @author Hzy980512
 * @author Yfdyh000
 */
$messages['zh-hans'] = array(
	'editaccount' => '编辑账户',
	'editaccount-desc' => '允许管理人员处理用户帐户信息',
	'editaccount-title' => 'Special:EditAccount',
	'editaccount-frame-manage' => '编辑账户',
	'editaccount-frame-usage' => '注意',
	'editaccount-usage' => '用户数据被每个Wiki分别储存。当您修改密码或电子邮箱时，只会在修改的Wiki上生效。请直接使用新密码登入该Wiki，以避免缓存问题。',
	'editaccount-label-select' => '选择一个用户',
	'editaccount-submit-account' => '管理用户',
	'editaccount-frame-account' => '编辑用户帐户:$1',
	'editaccount-label-email' => '设置新电子邮件地址',
	'editaccount-label-pass' => '设置新密码',
	'editaccount-label-realname' => '设置新真实姓名',
	'editaccount-label-clearunsub' => '已取消关注',
	'editaccount-submit-email' => '保存电子邮件地址',
	'editaccount-submit-pass' => '保存密码',
	'editaccount-submit-realname' => '保存真名',
	'editaccount-submit-close' => '关闭帐户',
	'editaccount-success-email-blank' => '成功移除帐户 $1 的电子邮件地址。',
	'editaccount-success-pass' => '帐户 $1 的密码更改成功。',
	'editaccount-success-realname' => '帐户 $1 的真实姓名更改成功。',
	'editaccount-success-close' => '成功禁用了帐户 $1 。',
	'editaccount-nouser' => '帐户“$1”不存在！',
	'editaccount-labal-account-status' => '帐户状态',
	'editaccount-labal-email-status' => '电子邮件状态',
	'editaccount-status-confirmed' => '已确认',
	'editaccount-status-unconfirmed' => '未确认',
	'editaccount-status-realuser' => '活跃用户',
	'editaccount-status-tempuser' => '临时用户',
	'editaccount-log' => '用户帐户日志',
	'right-editaccount' => '编辑其他用户的信息',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Dream
 * @author Horacewai2
 * @author Waihorace
 */
$messages['zh-hant'] = array(
	'editaccount' => '編輯帳戶',
	'editaccount-submit-account' => '管理帳戶',
);

