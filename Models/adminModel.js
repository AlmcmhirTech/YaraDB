const { adminconn, conn } = require('../server');

class Admin{

    constructor(){
    }

    async getAllPatientsData(){
        const query = `SELECT u.user_id, CONCAT(u.first_name, ' ', u.last_name) AS name, u.email, u.mobile_number,
        CAST(a.appointment_date AS CHAR(255)) AS appointment_date_str, 
        CONCAT(DATEDIFF(CURDATE(), a.appointment_date), ' days ago') AS appointment_date, 
        CONCAT(DATEDIFF(CURDATE(), p.payment_date), ' days ago') AS payment_date
        FROM users u
        LEFT JOIN (
          SELECT user_id, MAX(appointment_date) AS appointment_date
          FROM appointments
          GROUP BY user_id
        ) a ON u.user_id = a.user_id LEFT JOIN (SELECT user_id, MAX(payment_date) AS payment_date 
        FROM patients_payment GROUP BY user_id) p ON u.user_id = p.user_id`;

        try{
            const [result] = await conn.execute(query);
            return result;
        }catch(error){
            throw new Error(error.message);
        }
    }
    async getAllClinicData(){
        const query = `SELECT c.*, COUNT(a.appointment_id) AS appointments_count FROM clinics c JOIN appointments a
        ON c.clinic_id = a.clinic_id`;

        try{
            const [result] = await conn.execute(query);
            return result;
        }catch(error){
            throw new Error(error.message);
        }
    }

    async allBranchesRequest(){
        const query = `SELECT pending_id,branch_address, clinic_name,
        mobile_number, license, description, CONCAT(DATEDIFF(CURDATE(), request_date), ' days ago') AS request_date, request_type
        FROM admin_branch_requests`;


        try{
            const [result] = await adminconn.execute(query);
            return result;

        }catch(error){
            throw new Error(error.message);
        }

    }
    async  allServicesRequest(){
        const query = `SELECT pending_id, service_name, clinic_name,
        price, description, CONCAT(DATEDIFF(CURDATE(), created_at), ' days ago') AS created_At
        FROM add_service_requests`;

        try{
            const [result] = await adminconn.execute(query);
            return result;

        }catch(error){
            throw new Error(error.message);
        }

    }
    async  allAccountsRequest(){
        const query = `SELECT pending_id, clinic_name, 
        clinic_email, mobile_number, clinic_address,  village, postcode, CONCAT(DATEDIFF(CURDATE(), request_date), ' days ago') AS request_date
        FROM admin_clinics`;

        try{
            const [result] = await adminconn.execute(query);
            return result;

        }catch(error){
            throw new Error(error.message);
        }

    }

    async calculateDailyIncome(){
        const query = `SELECT SUM(amount * 0.10) as income, DAYNAME(payment_date) AS day 
        FROM patients_payment WHERE payment_status = 'Paid' GROUP BY DAYNAME(payment_date)`;

        try{
            const [result] = await conn.execute(query);
            return result;

        }catch(error){
            throw new Error(error.message);
        }

    }
    async calculateMonthlyIncome(){
        const query = `SELECT SUM(amount * 0.10) as income, MONTHNAME(payment_date) AS month 
        FROM patients_payment GROUP BY MONTHNAME(payment_date)`;

        try{
            const [result] = await conn.execute(query);
            return result;

        }catch(error){
            throw new Error(error.message);
        }

    }
    async countAllAppointments(){
        const query = `SELECT COUNT(*) as count, s.service_name FROM services s JOIN appointments a 
        ON s.service_id = a.service_id GROUP BY s.service_name`;

        try{
            const [result] = await conn.execute(query);
            return result;

        }catch(error){
            throw new Error(error.message);
        }
    }

    
    async allSuccessfulAppointments(){
        const query = `SELECT COUNT(*) as count, s.service_name FROM services s JOIN appointments a 
        ON s.service_id = a.service_id AND a.status = 'Accepted' GROUP BY s.service_name`;

        try{
            const [result] = await conn.execute(query);
            return result;

        }catch(error){
            throw new Error(error.message);
        }
    }
    async deletePatient(user_id){
        const query = `DELETE FROM users WHERE user_id = ?`;

        try{
            const [result] = await conn.execute(query, [user_id]);
            return result;

        }
        catch(error){
            throw new Error(error.message);
        }
    }

    async deleteClinic(clinic_id){
        const query = `DELETE FROM clinics WHERE clinic_id = ?`;

        try{
            const [result] = await conn.execute(query, [clinic_id]);
            return result;

        }
        catch(error){
            throw new Error(error.message);
        }
    }
    async deleteClinicRequest(pendingId){
        const query = `DELETE FROM admin_clinics WHERE pending_id = ?`;

        try{
            const [result] = await adminconn.execute(query, [pendingId]);
            return result;

        }
        catch(error){
            throw new Error(error.message);
        }
    }

    async acceptClinics(clinicName, clinicEmail, clinicAddress, village, postcode, password, mobileNumber){
        const query = `INSERT INTO clinics(clinic_name, clinic_email, clinic_address, village, postcode, password, mobileNumber)
        VALUES(?, ?, ?, ?, ?, ? ,?)`;

        try{
            const [result] = await conn.execute(query, [clinicName, clinicEmail, 
                clinicAddress, village, postcode, password, mobileNumber]);
            return result;

        }
        catch(error){
            throw new Error(error.message);
        }
    }

    async deleteServiceRequest(pendingId){
        const query = `DELETE FROM add_service_requests WHERE pending_id = ?`;

        try{
            const [result] = await adminconn.execute(query, [pendingId]);
            return result;

        }
        catch(error){
            throw new Error(error.message);
        }
    }

    async acceptServices(serviceName, Price){
        const query = `INSERT INTO services(service_name, pricing)
        VALUES(?, ?)`;

        try{
            const [result] = await conn.execute(query, [serviceName, Price]);
            return result;

        }
        catch(error){
            throw new Error(error.message);
        }
    }
    async deleteBranchRequest(pendingId){
        const query = `DELETE FROM admin_branch_requests WHERE pending_id = ?`;

        try{
            const [result] = await adminconn.execute(query, [pendingId]);
            return result;

        }
        catch(error){
            throw new Error(error.message);
        }
    }

    async acceptBranch(branchAddress, mobileNumber, license, clinicName){
        const query = `INSERT INTO branches(branch_address, mobile_number, license, clinic_name)
        VALUES(?, ?, ?, ?)`;

        try{
            const [result] = await conn.execute(query, [branchAddress, mobileNumber, license, clinicName]);
            return result;

        }
        catch(error){
            throw new Error(error.message);
        }
    }

    

}

module.exports = Admin;