<?php

class Application
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll(): array|bool
    {
        $query = 'SELECT * FROM `application_documents`';
        $this->db->query($query);
        return $this->db->getAll();
    }

    public function getById($id): mixed
    {
        $query = 'SELECT * FROM `application_documents` WHERE `id`=:id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->getSingle();
    }
    public function create(array $data): void
    {
        $query = <<<SQL
            INSERT INTO
                `review_events` (`vessel_info_id`, `company_id`, `work_item`, `start_shipment_time`, `required_return_date`, `vessel_category_id`, `number`, `is_signed`)
            VALUES
                (:wind_farm_id, :item, :detail, :start_shipment_time, :required_return_date, :vessel_category_id, :number, :is_signed)
        SQL;
        $this->db->query($query);
        $this->db->bind(':wind_farm_id', $data['wind_farm_id']);
        $this->db->bind(':item', $data['item']);
        $this->db->bind(':detail', $data['detail']);
        $this->db->bind(':start_shipment_time', $data['start_shipment_time']);
        $this->db->bind(':required_return_date', $data['required_return_date']);
        $this->db->bind(':vessel_category_id', $data['vessel_category_id']);
        $this->db->bind(':number', $data['number']);
        $this->db->bind(':is_signed', $data['is_signed'] == '1');
        $this->db->execute();
    }

    public function createApplication(array $data,$id):int
    {
        $query1 =<<<SQL
            INSERT INTO `applications`(`applicant_id`) VALUES ($id);
        SQL;
        $this->db->query($query1);
        $this->db->execute();
        $query2='SELECT @@IDENTITY as ID';
        $this->db->query($query2);
        $this->db->execute();
        $application=$this->db->getSingle();
        $data['application_id']=$application['ID'];
        $query3 = <<<SQL
            INSERT INTO
            `application_informations`(`application_id`,`wind_farm_id`, `work_item`,`vessel_category_id`,`required_sailing_date`,`required_return_date`,`description`)
            VALUES
                (:application_id,:wind_farm_id,:work_item,:vessel_category_id,:required_sailing_date,:required_return_date,:description)
        SQL;
        $this->db->query($query3);
        $this->db->bind(':application_id',$data['application_id']);
        $this->db->bind(':wind_farm_id', $data['wind_farm_id']);
        $this->db->bind(':work_item', $data['work_item']);
        $this->db->bind(':vessel_category_id', $data['vessel_category_id']);
        $this->db->bind(':required_sailing_date', $data['required_sailing_date']);
        $this->db->bind(':required_return_date', $data['required_return_date']);
        $this->db->bind('description', $data['description']);
        $this->db->execute();
        return $application['ID'];
        
    }
    public function retrieveApplication($id): mixed
    {
        $query = <<<SQL
        SELECT * FROM `applications` WHERE `applicant_id`=$id
        SQL;
        $this->db->query($query);
       // $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->getAll();
    }
    public function createApplicationShip($data): void
    {
        $query1 =<<<SQL
            INSERT INTO `application_foreign_vessel`(`foreign_vessel_id`,`application_id`) 
            VALUES (:foreign_vessel_id,:application_id)
        SQL;
        $this->db->query($query1);
        $this->db->bind(':foreign_vessel_id',$data['foreign_vessel_id']);
        $this->db->bind(':application_id', $data['application_id']);
        $this->db->execute();
    }
    public function createRequireSpec(array $data ,$application_id): void
    {
            
            $query = <<<SQL
                   INSERT INTO `vessel_details`(`specification_one`, `specification_two`, `specification_three`, `specification_four`, `specification_five`, `specification_six`, `specification_seven`)
                   VALUES (:1,:2,:3, :4, :5, :6,:7)
            SQL;
            $this->db->query($query);
            $this->db->bind(':1', $data[1]);
            $this->db->bind(':2', $data[2]);
            $this->db->bind(':3', $data[3]);
            $this->db->bind(':4', $data[4]);
            $this->db->bind(':5', $data[5]);
            $this->db->bind(':6', $data[6]);
            $this->db->bind(':7', $data[7]);
            $this->db->execute();
            $query2=    
                'SELECT @@IDENTITY as ID';
            $this->db->query($query2);
            $this->db->execute();
            $vessel_detail_id=$this->db->getSingle();
            $data['vessel_detail_id']=$vessel_detail_id['ID'];
            $data['application_id']=$application_id;
            $query3 = <<<SQL
                INSERT INTO `application_vessel_requirements`(`application_id`,`vessel_detail_id`)
                VALUES(:application_id,:vessel_detail_id)
            SQL;
            $this->db->query($query3);
            $this->db->bind(':application_id', $data['application_id']);
            $this->db->bind(':vessel_detail_id', $data['vessel_detail_id']);
            $this->db->execute();
            }

    public function retrieveUsableShip(): mixed{
        $query = <<<SQL
        SELECT * FROM `vessels`
        SQL;
        $this->db->query($query);
        $this->db->execute();
        return $this->db->getAll();
    }
    public function retrieveApplicationById(int $id): mixed{
        $query = 'SELECT * FROM `applications` WHERE  `applicat_id`= :id';
        $this->db->query($query);   
        $this->db->bind('id', $id);
        return $this->db->getAll();
    }
    public function retrieveInformationById(int $id): mixed{
        $query = 'SELECT * FROM `application_informations` WHERE `id`=:id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->getSingle();
    }
    public function retrieveShipById(int $id): mixed{
        $query = 'SELECT * FROM `application_foreign_vessel` WHERE `id`=:id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->getSingle();
    }
    public function retrieveRequirementById(int $id): mixed{
        $query = 'SELECT * FROM `application_vessel_requirements` WHERE `id`=:id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->getSingle();
    }
}

