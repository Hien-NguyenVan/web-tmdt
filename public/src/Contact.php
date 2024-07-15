<?php

namespace CT275\Labs;

class Contact
{
	private $db;

	private $id = -1;
	public $name;
	public $phone;
	public $notes;
	public $price;
	public $Type;
	public $file;
	public $target_file;
	public $filename;
	public $created_at;
	public $updated_at;
	
	private $errors = [];

	public function getId()
	{
		return $this->id;
	}

	public function __construct($PDO)
	{
		$this->db = $PDO;
	}

	public function fill(array $data)
	{
		if (isset($data['name'])) {
			$this->name = trim($data['name']);
		}

		// if (isset($data['phone'])) {
		// 	$this->phone = preg_replace('/\D+/', '', $data['phone']);
		// }

		if (isset($data['price'])) {
			$this->price = trim($data['price']);
		}

		if (isset($data['Type'])) {
			$this->Type = trim($data['Type']);
		}
		// if (isset($data['files'])) {
		// 	$this->file = $_FILES['files']['name'];
		// }
		$this->filename = $_FILES['files']['name'];
		$this->target_file ='admin/upload/'. $this->filename;
		return $this;
	
}

	public function getValidationErrors()
	{
		return $this->errors;
	}

	public function validate()
	{
		if (!$this->name) {
			$this->errors['name'] = 'Invalid name.';
		}

		

		if (!$this->price) {
			$this->errors['price'] = 'Invalid price';
		}
		if (!$this->Type) {
			$this->errors['Type'] = 'Invalid type';
		}
		$this->file = $_FILES['files']['name'];
		if (!$this->file) {
			$this->errors['files'] = 'Invalid file';
		}
		$filename = $_FILES['files']['name'];
		
		$target_file ='../admin/upload/'. $filename;
		
		move_uploaded_file(
			$_FILES['files']['tmp_name'],$target_file);
		return empty($this->errors);
	
}

	public function all()
		{
			$contacts = [];
			$statement = $this->db->prepare('select * from products');
			$statement->execute();
			while ($row = $statement->fetch()) {
			$contact = new Contact($this->db);
			$contact->fillFromDB($row);
			$contacts[] = $contact;
			}
			return $contacts;
		}
		

	protected function fillFromDB(array $row)
		{
		[
		'id' => $this->id,
		'name' => $this->name,
		// 'phone' => $this->phone,
		'price' => $this->price,
		'created_at' => $this->created_at,
		'updated_at' => $this->updated_at,
		'Type' => $this->Type,
		'image' =>$this->filename,
		'image_name' =>$this->target_file
		] = $row;
		return $this;
		}
		
	public function save()
	{
		$result = false;
		if ($this->id >= 0) {
		$statement = $this->db->prepare(
		'update products set name = :name,
		 price = :price,Type = :Type, updated_at = now()
		where id = :id'
		);
		$result = $statement->execute([
		'name' => $this->name,
		
		'price' => $this->price,
		'Type' => $this->Type,
		'id' => $this->id]);
		} else {
			for($i = 1;$i<2;$i++){
			// $this->filename = $_FILES['files']['name'];
			// $this->target_file ='../admin/upload/'. $filename;
		$statement = $this->db->prepare(
		'insert into products (name, price, Type, image, image_name)
		values (:name,  :price, :Type, :filename, :target_file)'
		);
		$result = $statement->execute([
			':name' => $this->name,
			':price' => $this->price,
			':Type' => $this->Type,
			':filename' => $this->filename,
			':target_file' => $this->target_file
		]);}
		if ($result) {
		$this->id = $this->db->lastInsertId();
		}
		}
		return $result;
	}
	public function find($id)
		{
			$statement = $this->db->prepare('select * from products where id = :id');
			$statement->execute(['id' => $id]);
			if ($row = $statement->fetch()) {
			$this->fillFromDB($row);
			return $this;
			}
			return null;
		}
	public function update(array $data)
		{
			$this->fill($data);
			if ($this->validate()) {
			return $this->save();
			}
			return false;
		}
	public function delete()
		{
			$statement = $this->db->prepare('delete from products where id = :id');
			return $statement->execute(['id' => $this->id]);
		}
		
}


