const { adminconn, conn } = require('../server');


class Clinic{

    constructor(clinic_id, clinic_name, clinic_address, clinic_email, password, mobile_number, license_code){
        this.clinic_id = clinic_id;
        this.clinic_name = clinic_name;
        this.clinic_address = clinic_address;
        this.clinic_email = clinic_email;
        this.password = password;
        this.mobile_number = mobile_number;
        this.license_code = license_code;
    }
    async newServiceRequest(clinic_id, service_name, price, description){
        console.log(clinic_id, service_name, price);
        const query = `INSERT INTO add_service_requests(clinic_id, service_name, price, description) VALUES(?, ?, ?, ?)`;

        try{
            const [result] = await adminconn.execute(query, [clinic_id, service_name, price, description]);

            return result;

        }
        catch(error){
            throw new Error(error.message);
        }
    }
    async AddServices(clinic_id, service_id, price, description){
        const query = `INSERT INTO clinics_services(clinic_id, service_id, pricing, description) VALUES(?, ?, ?, ?)`;

        try{
            const [result] = await conn.execute(query, [clinic_id, service_id, price, description]);

            return result;

        }
        catch(error){
            throw new Error(error.message);
        }
    }
    async getServiceName(service_id){
        const query = `SELECT service_name FROM services WHERE service_id = ?`;

        try{
            const [result] = await conn.execute(query, [service_id]);

            return result;

        }
        catch(error){
            throw new Error(error.message);
        }
    }
    async getClinicsServices(clinic_id, byVillageValue, byPostcodeValue, byAddressValue){
        const query = `SELECT s.*, c.* FROM clinics_services c JOIN services s 
        ON c.service_id = s.service_id WHERE c.clinic_id = ?`;

        try{
            const [result] = await conn.execute(query, [clinic_id]);

            return result;

        }
        catch(error){
            throw new Error(error.message);
        }
    }
    async deleteClinicsServices(service_id, clinic_id){
        const query = `DELETE FROM clinics_services WHERE service_id = ? AND clinic_id = ?`;

        try{
            const [result] = await conn.execute(query, [service_id, clinic_id]);

            return result;

        }
        catch(error){
            throw new Error(error.message);
        }
    }
    async deleteBranches(branch_id){
        const query = `DELETE FROM branches WHERE branch_id = ?`;

        try{
            const [result] = await conn.execute(query, [branch_id]);

            return result;

        }
        catch(error){
            throw new Error(error.message);
        }
    }
    async deleteTransactions(payment_id){
        const query = `DELETE FROM patients_payment WHERE payment_id = ?`;

        try{
            const [result] = await conn.execute(query, [payment_id]);

            return result;

        }
        catch(error){
            throw new Error(error.message);
        }
    }

    async getServicesCategories(){
        const query = `SELECT * FROM services`;
  
        try{
          const [result] = await conn.execute(query);
          
          return result;
        
        }catch(error){
            throw new Error(error.message);
        }

    }
    
    async getServicesCategories(){
        const query = `SELECT * FROM services`;
  
        try{
          const [result] = await conn.execute(query);
          
          return result;
        
        }catch(error){
            throw new Error(error.message);
        }

    }

    async verifyClinic(clinic_email){
        const query = `SELECT * FROM clinics WHERE clinic_email = ?`;

        try{
            const [result] = await conn.execute(query, [clinic_email]);

            if (result.length === 0){
                throw new Error('No user found with the provided email');
            }

            return result;

        }
        catch(error){
            throw new Error(error.message);
        }
    }     

    async getClinics(byVillageValue, byPostcodeValue, byAddressValue){
        const query = `
        SELECT * FROM clinics 
        WHERE village = ? OR postcode = ? OR clinic_address LIKE ?`;
        // const query = `
        // SELECT * FROM clinics 
        // WHERE (village = ? OR ? IS NULL) 
        // OR (postcode = ? OR ? IS NULL) 
        // OR (clinic_address LIKE ? OR ? IS NULL)`;
        // console.log('hey');

        try{
            const [result] = await conn.execute(query, [byVillageValue, byPostcodeValue, `%${byAddressValue}%`]);
            return result;

        }catch(error){
            throw new Error(error.message);
        }
    }
    // `%${byAddressValue}%`
    async getClinicProfile(clinic_id){
        const query = `SELECT * FROM clinics WHERE clinic_id = ?`;
        try{
            const [result] = await conn.execute(query, [clinic_id]);
            return result;

        }catch(error){
            throw new Error(error.message);
        }
    }
    async getClinicData(){
        const query = `SELECT * FROM clinics`;
        try{
            const [result] = await conn.execute(query);
            return result;

        }catch(error){
            throw new Error(error.message);
        }
    }

    //clinics side functions below

    async clinicRegister(clinic_name, clinic_address, village, post_code, clinic_email, password, mobile_number, license_code){
        console.log(clinic_name, clinic_address, village, post_code, clinic_email, password, mobile_number, license_code);
        const query = `INSERT INTO admin_clinics(clinic_name, clinic_address, village, postcode, clinic_email, password, mobile_number, license_code) 
        VALUES(?, ?, ?, ?, ?, ?, ?, ?)`;
        
        try{
            const [result] = await adminconn.execute(query, [clinic_name, clinic_address, village, post_code, clinic_email, 
                password, mobile_number, license_code]);

            return result;

        }catch(error){
            throw new Error(error.message);
        }
    }

    async countAppointments(clinic_id){
        const query = `SELECT COUNT(a.appointment_id) as count, s.service_name FROM services s JOIN appointments a 
        ON s.service_id = a.service_id WHERE a.clinic_id = ? GROUP BY s.service_name`;

        try{
            const [result] = await conn.execute(query, [ clinic_id ]);
            return result;

        }catch(error){
            throw new Error(error.message);
        }
    }

    async successfulAppointments(clinic_id){
        const query = `SELECT COUNT(a.appointment_id) as count, s.service_name FROM services s JOIN appointments a 
        ON s.service_id = a.service_id WHERE a.clinic_id = ? AND a.status = 'Accepted' GROUP BY s.service_name`;

        try{
            const [result] = await conn.execute(query, [ clinic_id ]);
            return result;

        }catch(error){
            throw new Error(error.message);
        }
    }
    async allPatients(clinic_id){
        const query = `SELECT CONCAT(u.first_name, ' ', u.middle_name, ' ', u.last_name) as name,
        a.appointment_date, s.service_name, a.status FROM users u JOIN u.user_id = a.user_id
        JOIN services s ON s.service_id = a.service_id JOIN branches b ON b.branch_id = u.branch_id WHERE a.clinic_id = ?`;

        try{
            const [result] = await conn.execute(query, [ clinic_id ]);
            return result;

        }catch(error){
            throw new Error(error.message);
        }
    }
     async allPatients(clinic_id){
        const query = `
        SELECT 
          CONCAT(u.first_name, ' ', u.middle_name, ' ', u.last_name) AS name,
          a.appointment_date,
          s.service_name, 
          a.status
        FROM 
          users u
        JOIN 
          appointments a ON u.user_id = a.user_id
        JOIN 
          services s ON s.service_id = a.service_id
        JOIN 
          branches b ON b.branch_id = a.branch_id
        WHERE 
          a.clinic_id = ?
      `;
        try{
            const [result] = await conn.execute(query, [ clinic_id ]);
            return result;

        }catch(error){
            throw new Error(error.message);
        }
    }
    async allReports(clinic_id){
        const query = `
        SELECT 
        CONCAT(r.patient_name) as name,
          r.report_date,
          r.report_type,
          r.status
        FROM 
          user_reports r
        JOIN
          clinics c ON r.clinic_id = c.clinic_id
        WHERE 
          r.clinic_id = ?
      `;
        try{
            const [result] = await conn.execute(query, [ clinic_id ]);
            return result;

        }catch(error){
            throw new Error(error.message);
        }
    }

    async updateProfiles(clinic_id, email){
        const query = `UPDATE clinics SET clinic_email = ? WHERE clinic_id = ?`;
        try{
            const [result] = await conn.execute(query, [ email, clinic_id]);
            return result;

        }catch(error){
            throw new Error(error.message);
        }

    }
    async updateServices(clinic_id, service_id, pricing, description){
        const query = `UPDATE clinics_services SET service_id = ?, pricing = ?, description = ? WHERE clinic_id = ?`;
        try{
            const [result] = await conn.execute(query, [ service_id, pricing, description, clinic_id ]);
            return result;

        }catch(error){
            throw new Error(error.message);
        }

    }
    async updateBranches(branch_id, branch_address, mobile_number, branch_image, license){
        const query = `UPDATE branches SET branch_address = ?, mobile_number = ?, branch_image = ?, license = ? WHERE branch_id = ?`;
        try{
            const [result] = await conn.execute(query, [ branch_address, mobile_number, branch_image, license, branch_id ]);
            return result;

        }catch(error){
            throw new Error(error.message);
        }

    }

async changeRequest(clinic_id, new_clinic_address, new_clinic_name, new_license_code, file_id, status){
        const query = `INSERT INTO change_requests(clinic_id, new_clinic_address, new_clinic_name,
          new_license_code, file_id, status) VALUES (?, ?, ?, ?, ?, ?)`;
      
          try{
            await adminconn.execute(query, [clinic_id, new_clinic_address, new_clinic_name, new_license_code, file_id, status])
          }catch(error){
            console.error(error.message);
          }
      }
      async getBranches(clinic_id){
        const query = `SELECT * FROM branches WHERE clinic_id = ?`;
        
            try{
              const [result] = await conn.execute(query, [clinic_id]);
              return result;
            }catch(error){
              console.error(error.message);
            }
        
    }
    async addBranchRequest(clinic_name, branch_address, license, branch_image, mobile_number, request_type){
        const query = `INSERT INTO admin_branch_requests(branch_address, license, branch_image, mobile_number, clinic_name, request_type)
        VALUES(?, ?, ?, ?, ?, ?)`;
        console.log(clinic_name, branch_address, license, branch_image, mobile_number, request_type);
        
            try{
              const [result] = await adminconn.execute(query, [ branch_address, license, branch_image, mobile_number, clinic_name, request_type]);
              return result;
            }catch(error){
              console.error(error.message);
            }
        
    }
    async editBranchRequest(clinic_id, branch_address, license, branch_image, mobile_number, request_type){
        const query = `INSERT INTO admin_branch_requests(branch_address, license, branch_image, mobile_number, clinic_id, request_type)
        VALUES(?, ?, ?, ?, ?, ?)`;
        console.log(clinic_id, branch_address, license, branch_image, mobile_number, request_type);
        
            try{
              const [result] = await adminconn.execute(query, [ branch_address, license, branch_image, mobile_number, clinic_id, request_type ]);
              return result;
            }catch(error){
              console.error(error.message);
            }
        
    }
    async deleteBranchRequest(clinic_id, branch_address, license, branch_image, mobile_number, request_type){
        const query = `INSERT INTO admin_branch_requests(branch_address, license, branch_image, mobile_number, clinic_id, request_type)
        VALUES(?, ?, ?, ?, ?, ?)`;
        console.log(clinic_id, branch_address, license, branch_image, mobile_number, request_type);
        
            try{
              const [result] = await adminconn.execute(query, [ branch_address, license, branch_image, mobile_number, clinic_id, request_type ]);
              return result;
            }catch(error){
              console.error(error.message);
            }
        
    }

    async getPayments(clinic_id){
            const query = `SELECT CONCAT(p.first_name, ' ', p.last_name) as name, p.service_id, p.first_name, p.last_name, p.payment_status, p.payment_id, p.payment_method_id, p.amount, s.service_name, p.payment_date, pm.payment_method 
            FROM patients_payment p JOIN services s ON p.service_id = s.service_id JOIN payment_method pm ON p.payment_method_id = pm.payment_id WHERE p.clinic_id = ?`;

    
            try{
                const [result] = await conn.execute(query, [clinic_id]);
    
                return result;
    
            }
            catch(error){
                throw new Error(error.message);
           
    }
}
    async addTransaction(clinic_id, first_name, last_name, amount, service_id, payment_date, payment_method_id, status){
        const query = `INSERT INTO patients_payment(clinic_id, first_name, last_name, amount, service_id, payment_date, payment_method_id, payment_status)
        VALUES(?, ?, ?, ?, ?, ?, ?, ? )`;
        console.log(clinic_id, first_name, last_name, amount, service_id, payment_date, payment_method_id, status);
        
            try{
              const [result] = await conn.execute(query, [ clinic_id, first_name, last_name, amount, service_id, payment_date, payment_method_id, status ]);
              return result;
            }catch(error){
              console.error(error.message);
            }
    }

    async confirmTransaction(payment_id, first_name, last_name, payment_date, service_id, payment_method_id, amount){
        const query = `UPDATE patients_payment SET first_name = ?, last_name = ?, payment_date = ?, service_id = ?,
        payment_method_id = ?, amount = ?, payment_status = 'Paid' WHERE payment_id = ?`;

        try{
            const [result] = await conn.execute(query, [first_name, last_name, payment_date, service_id, payment_method_id, amount, payment_id]);
        }catch(error){
            throw new Error(error.message);
        }
    }
    async updateTransaction(payment_id, first_name, last_name, payment_date, service_id, payment_method_id, amount){
        const query = `UPDATE patients_payment SET first_name = ?, last_name = ?, payment_date = ?, service_id = ?,
        payment_method_id = ?, amount = ? WHERE payment_id = ?`;

        try{
            const [result] = await conn.execute(query, [first_name, last_name, payment_date, service_id, payment_method_id, amount, payment_id]);
        }catch(error){
            throw new Error(error.message);
        }
    }

    async getMethods(){
        const query = `SELECT * FROM payment_method`;
        
            try{
              const [result] = await conn.execute(query);
              return result;
            }catch(error){
              console.error(error.message);
            }
    }
}

module.exports = Clinic;

