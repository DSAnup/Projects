<?php
/*
 * BanglaDate - English to Bangla date converter
 * @package BanglaDate
 * @author Tareq Hasan
 * @link http://tareq.weDevs.com
 * @copyright 2010 Tareq Hasan
 *
 *
 * Example of Use:
 *
 * Initialize/set the time:
 * $bn = new BanglaDate(strtotime('18-03-1988'), 0);
 * or
 * $bn = new BanglaDate(time(), 6);
 * or
 * $bn = new BanglaDate(time());
 *
 * Get Output
 * $output = $bn->get_date();
 * print_r($output);
 */

#**********************************************************************
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# ( at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# ERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Online: http://www.gnu.org/licenses/gpl.txt

# *****************************************************************

class BanglaDate
{
	private $timestamp;	//timestamp as input
	private $morning;	//when the date will change?
	
	private $engHour;	//Current hour of English Date
	private $engDate;	//Current date of English Date
	private $engMonth;	//Current month of English Date
	private $engYear;	//Current year of English Date
	
	private $bangDate;	//generated Bangla Date
	private $bangMonth;	//generated Bangla Month
	private $bangYear;	//generated Bangla	Year

	/*
	 * Set the initial date and time
	 *
	 * @param	int timestamp for any date
	 * @param	int, set the time when you want to change the date. if 0, then date will change instantly.
	 *			If it's 6, date will change at 6'0 clock at the morning. Default is 6'0 clock at the morning
	 */
	function __construct($timestamp, $hour = 6)
	{
		$this->BanglaDate($timestamp, $hour);
	}
	
	/*
	* PHP4 Legacy constructor
	*/
	function BanglaDate($timestamp, $hour = 6)
	{
		$this->engDate = date('d', $timestamp);
		$this->engMonth = date('m', $timestamp);
		$this->engYear = date('Y', $timestamp);
		$this->morning = $hour;
		$this->engHour = date('G', $timestamp);
		
		//calculate the bangla date
		$this->calculate_date();
		
		//now call calculate_year for setting the bangla year
		$this->calculate_year();
		
		//convert english numbers to Bangla
		$this->convert();
	}
	
	function set_time($timestamp, $hour = 6)
	{
		$this->BanglaDate($timestamp, $hour);
	}

	/*
	 * Calculate the Bangla date and month
	 */
	function calculate_date()
	{
		//when English month is January
		if($this->engMonth == 1)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 17;
					$this->bangMonth = "Poush";
				}
				else
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "Poush";
				}
			}
			else if($this->engDate < 14 && $this->engDate > 1) // Date 2-13
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 17;
					$this->bangMonth = "Poush";
				}
				else
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "Poush";
				}
			}

			else if($this->engDate == 14) //Date 14
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 13;
					$this->bangMonth = "Magh";
				}
				else
				{
					$this->bangDate = 30;
					$this->bangMonth = "Poush";
				}
			}
			else //Date 15-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 13;
					$this->bangMonth = "Magh";
				}
				else 
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "Magh";
				}
			}
		}

		
		//when English month is February		
		else if($this->engMonth == 2)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 18;
					$this->bangMonth = "Magh";
				}
				else
				{
					$this->bangDate = $this->engDate + 17;
					$this->bangMonth = "Magh";
				}
			}
			else if($this->engDate < 13 && $this->engDate > 1) // Date 2-12
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 18;
					$this->bangMonth = "Magh";
				}
				else
				{
					$this->bangDate = $this->engDate + 17;
					$this->bangMonth = "Magh";
				}
			}

			else if($this->engDate == 13) //Date 13
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 12;
					$this->bangMonth = "Falgun";
				}
				else
				{
					$this->bangDate = 30;
					$this->bangMonth = "Magh";
				}
			}
			else //Date 15-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 12;
					$this->bangMonth = "Falgun";
				}
				else 
				{
					$this->bangDate = $this->engDate - 13;
					$this->bangMonth = "Falgun";
				}
			}
		}
		
		//when English month is March		
		else if($this->engMonth == 3)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					if($this->is_leapyear())$this->bangDate = $this->engDate + 17;
					else $this->bangDate = $this->engDate + 16;
					$this->bangMonth = "Falgun";
				}
				else
				{
					if($this->is_leapyear()) $this->bangDate = $this->engDate + 16;
					else $this->bangDate = $this->engDate + 15;
					$this->bangMonth = "Falgun";
				}
			}
			else if($this->engDate < 15 && $this->engDate > 1) // Date 2-13
			{
				if($this->engHour >=$this->morning)
				{
					if($this->is_leapyear()) $this->bangDate = $this->engDate + 17;
					else $this->bangDate = $this->engDate + 16;
					$this->bangMonth = "Falgun";
				}
				else
				{
					if($this->is_leapyear()) $this->bangDate = $this->engDate + 16;
					else $this->bangDate = $this->engDate + 15;
					$this->bangMonth = "Falgun";
				}
			}

			else if($this->engDate == 15) //Date 14
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "Choytro";
				}
				else
				{
					$this->bangDate = 30;
					$this->bangMonth = "Falgun";
				}
			}
			else //Date 15-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "Choytro";
				}
				else 
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "Choytro";
				}
			}
		}
		
		//when English month is April		
		else if($this->engMonth == 4)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 17;
					$this->bangMonth = "Choytro";
				}
				else
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "Choytro";
				}
			}
			else if($this->engDate < 14 && $this->engDate > 1) // Date 2-13
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 17;
					$this->bangMonth = "Choytro";
				}
				else
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "Choytro";
				}
			}

			else if($this->engDate == 14) //Date 14
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 13;
					$this->bangMonth = "Boishak";
				}
				else
				{
					$this->bangDate = 30;
					$this->bangMonth = "Choytro";
				}
			}
			else //Date 15-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 13;
					$this->bangMonth = "Boishak";
				}
				else 
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "Boishak";
				}
			}
		}

		
		//when English month is May
		else if($this->engMonth == 5)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 17;
					$this->bangMonth = "Boishak";
				}
				else
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "Boishak";
				}
			}
			else if($this->engDate < 15 && $this->engDate > 1) // Date 2-14
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 17;
					$this->bangMonth = "Boishak";
				}
				else
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "Boishak";
				}
			}

			else if($this->engDate == 15) //Date 14
			{
				if($this->engHour >= $this->morning)
					{
						$this->bangDate = $this->engDate - 14;
						$this->bangMonth = "Jhyosto";
					}
				else
					{
						$this->bangDate = 31;
						$this->bangMonth = "Choytro";
					}
			}
			else //Date 16-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "Jhyosto";
				}
				else 
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "Jhyosto";
				}
			}
		}

		
		//when English month is June
		else if($this->engMonth == 6)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 17;
					$this->bangMonth = "Jhyosto";
				}
				else
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "Jhyosto";
				}
			}
			else if($this->engDate < 15 && $this->engDate > 1) // Date 2-14
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 17;
					$this->bangMonth = "Jhyosto";
				}
				else
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "Jhyosto";
				}
			}

			else if($this->engDate == 15) //Date 15
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "Ashad";
				}
				else
				{
					$this->bangDate = 31;
					$this->bangMonth = "Jhyosto";
				}
			}
			else //Date 15-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "Ashad";
				}
				else 
				{
					$this->bangDate = $this->engDate - 13;
					$this->bangMonth = "Ashad";
				}
			}
		}

		
		//when English month is July		
		else if($this->engMonth == 7)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "Ashad";
				}
				else
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "Ashad";
				}
			}
			else if($this->engDate < 16 && $this->engDate > 1) // Date 2-15
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "Ashad";
				}
				else
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "Ashad";
				}
			}

			else if($this->engDate == 16) //Date 16
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "Srabon";
				}
				else
				{
					$this->bangDate = 31;
					$this->bangMonth = "Ashad";
				}
			}
			else //Date 17-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "Srabon";
				}
				else 
				{
					$this->bangDate = $this->engDate - 16;
					$this->bangMonth = "Srabon";
				}
			}
		}

		
		//when English month is August
		else if($this->engMonth == 8)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "Srabon";
				}
				else
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "Srabon";
				}
			}
			else if($this->engDate < 16 && $this->engDate > 1) // Date 2-15
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "Srabon";
				}
				else
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "Srabon";
				}
			}

			else if($this->engDate == 16) //Date 16
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "Vadro";
				}
				else
				{
					$this->bangDate = 31;
					$this->bangMonth = "Srabon";
				}
			}
			else //Date 15-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "Vadro";
				}
				else 
				{
					$this->bangDate = $this->engDate - 16;
					$this->bangMonth = "Vadro";
				}
			}
		}

		
		//when English month is September
		else if($this->engMonth == 9)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "Vadro";
				}
				else
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "Vadro";
				}
			}
			else if($this->engDate < 16 && $this->engDate > 1) // Date 2-15
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "Vadro";
				}
				else
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "Vadro";
				}
			}

			else if($this->engDate == 16) //Date 14
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "Arshin";
				}
				else
				{
					$this->bangDate = 31;
					$this->bangMonth = "Vadro";
				}
			}
			else //Date 15-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "Arshin";
				}
				else 
				{
					$this->bangDate = $this->engDate - 16;
					$this->bangMonth = "Arshin";
				}
			}
		}

		
		//when English month is October
		else if($this->engMonth == 10)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "Arshin";
				}
				else
				{
					$this->bangDate = $this->engDate + 14;
					$this->bangMonth = "Arshin";
				}
			}
			else if($this->engDate < 16 && $this->engDate > 1) // Date 2-15
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "Arshin";
				}
				else
				{
					$this->bangDate = $this->engDate + 14;
					$this->bangMonth = "Arshin";
				}
			}

			else if($this->engDate == 16) //Date 14
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "Kartik";
				}
				else
				{
					$this->bangDate = 30;
					$this->bangMonth = "Arshin";
				}
			}
			else //Date 17-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "Kartik";
				}
				else 
				{
					$this->bangDate = $this->engDate - 16;
					$this->bangMonth = "Kartik";
				}
			}
		}

		
		//when English month is November
		else if($this->engMonth == 11)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "Kartik";
				}
				else
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "Kartik";
				}
			}
			else if($this->engDate < 15 && $this->engDate > 1) // Date 2-14
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "Kartik";
				}
				else
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "Kartik";
				}
			}

			else if($this->engDate == 15) //Date 14
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "Augrohayon";
				}
				else
				{
					$this->bangDate = 30;
					$this->bangMonth = "Kartik";
				}
			}
			else //Date 15-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "Augrohayon";
				}
				else 
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "Augrohayon";
				}
			}
		}

		
		//when English month is December
		else if($this->engMonth == 12)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "Augrohayon";
				}
				else
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "Augrohayon";
				}
			}
			else if($this->engDate < 15 && $this->engDate > 1) // Date 2-14
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "Augrohayon";
				}
				else
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "Augrohayon";
				}
			}

			else if($this->engDate == 15) //Date 14
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "Poush";
				}
				else
				{
					$this->bangDate = 30;
					$this->bangMonth = "Augrohayon";
				}
			}
			else //Date 15-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "Poush";
				}
				else 
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "Poush";
				}
			}
		}
	}

	/*
	 * Checks, if the date is leapyear or not
	 *
	 * @return boolen. True if it's leap year or returns false
	 */
	function is_leapyear()
	{
		if($this->engYear%400 ==0 || ($this->engYear%100 != 0 && $this->engYear%4 == 0))
			return true;
		else
			return false;
	}

	/*
	 * Calculate the Bangla Year
	 */
	function calculate_year()
	{
		if($this->engMonth >= 4)
		{
			if($this->engMonth == 4 && $this->engDate < 14) //1-13 on april when hour is greater than 6
				{
					$this->bangYear = $this->engYear - 594;
				}
			else if($this->engMonth == 4 && $this->engDate == 14 && $this->engHour <=5)
				{
					$this->bangYear = $this->engYear - 594;
				}
			else if($this->engMonth == 4 && $this->engDate == 14 && $this->engHour >=6)
				{
					$this->bangYear = $this->engYear - 593;
				}	
			/*else if($this->engMonth == 4 && ($this->engDate == 14 && $this->engDate) && $this->engHour <=5) //1-13 on april when hour is greater than 6
				{
					$this->bangYear = $this->engYear - 593;
				}
				*/
			else
				$this->bangYear = $this->engYear - 593;
		}
		else $this->bangYear = $this->engYear - 594;
	}

	/*
	 * Convert the English character to Bangla
	 *
	 * @param int any integer number
	 * @return string as converted number to bangla
	 */
	function bangla_number($int)
	{
		$engNumber = array(1,2,3,4,5,6,7,8,9,0);
		$bangNumber = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
		
		$converted = str_replace($engNumber, $bangNumber, $int);
		return $converted;
	}

	/*
	 * Calls the converter to convert numbers to equivalent Bangla number
	 */
	function convert()
	{
		$this->bangDate = $this->bangla_number($this->bangDate);
		$this->bangYear = $this->bangla_number($this->bangYear);
	}

	/*
	 * Returns the calculated Bangla Date
	 *
	 * @return array of converted Bangla Date
	 */
	function get_date()
	{
		return array($this->bangDate, $this->bangMonth, $this->bangYear);
	}
}