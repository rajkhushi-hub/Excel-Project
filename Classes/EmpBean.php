<?php

    class EmpBean{
        private int $sno;
        private String $empId;
        private String $empName;
        private String $dob;
        private String $dept;
        private String $desg;
        private float $salary;
        private int $mobile;
        private String $email;
        private String $addr;
       
	public function getSno(): int {
		return $this->sno;
	}
	
	public function setSno(int $sno) {
		$this->sno = $sno;
	}

	public function getEmpId(): string {
		return $this->empId;
	}
	
	public function setEmpId(string $empId) {
		$this->empId = $empId;
	}

	public function getEmpName(): string {
		return $this->empName;
	}
	
	public function setEmpName(string $empName){
		$this->empName = $empName;
	}

	public function getDob(): string {
		return $this->dob;
	}
	
	public function setDob(string $dob){
		$this->dob = $dob;
	}

	public function getDept(): string {
		return $this->dept;
	}
	
	public function setDept(string $dept){
		$this->dept = $dept;
	}

	public function getDesg(): string {
		return $this->desg;
	}
	
	public function setDesg(string $desg) {
		$this->desg = $desg;
	}

	public function getSalary(): float {
		return $this->salary;
	}
	
	public function setSalary(float $salary) {
		$this->salary = $salary;
	}

	public function getMobile(): int {
		return $this->mobile;
	}
	
	public function setMobile(int $mobile) {
		$this->mobile = $mobile;
	}

	public function getEmail(): string {
		return $this->email;
	}
	
	public function setEmail(string $email){
		$this->email = $email;
	}

	public function getAddr(): string {
		return $this->addr;
	}
	
	public function setAddr(string $addr) {
		$this->addr = $addr;
	}
}
?>