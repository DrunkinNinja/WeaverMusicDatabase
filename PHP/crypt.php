<?
	require("../everypage.php");
	function encrypt($input)
	{
 
		$inputlen = strlen($input);// Counts number characters in string $input
		$randkey = rand(0, 9); // Gets a random number between 1 and 9
	 
		$i = 0;
		while ($i < $inputlen)
		{
	 
			$inputchr[$i] = (ord($input[$i]) - $randkey);//encrpytion 
	 
			$i++; // For the loop to function
		}
	 
		//Puts the $inputchr array togtheir in a string with the $randkey add to the end of the string
		$encrypted[0] = implode(':', $inputchr);
		$encrypted[1] = $randkey;
		
		return $encrypted;
	}
	
	function decrypt($input, $salt)
{
	
  $input_count = strlen($input);
 
  $dec = explode(":", $input);// splits up the string to any array
  $x = count($dec);

  $randkey = $salt;
  $i = 0;
 
   while ($i < $x)
  {
 
    $array[$i] = $dec[$i]+$randkey; // Works out the ascii characters actual numbers
    $real .= chr($array[$i]); //The actual decryption
 
    $i++;
  };
 
$input = $real;
return $input;
}
?>