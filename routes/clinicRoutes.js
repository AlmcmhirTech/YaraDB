const express = require('express');
const multer = require('multer');
const upload = multer()
const clinic_router = express.Router();

const {  renderPayments, confirmTransactions, updateTransactions, DeleteTransaction, AddTransactions, renderTransactions, DeleteBranches, updateBranch, renderBranches, DeleteClinicService, updateService, renderServices, AddClinicService, loginClinic, updateProfile, renderProfile, renderDynamicTable, renderBarGraphSuccessful, renderBarGraph, renderHomepage, registerClinics, renderClinicLogin, renderClinicRegister } = require('../Controllers/clinicController');

//Login Routes
clinic_router.get('/login', renderClinicLogin);
clinic_router.post('/homepage', loginClinic);

//Register Routes
clinic_router.get('/register', renderClinicRegister);
clinic_router.post('/registersuccess', registerClinics);

//Hompage Routes
clinic_router.get('/dynamic-table/:category', renderDynamicTable);
clinic_router.get('/homepage', renderHomepage);
clinic_router.get('/bardata',  renderBarGraph);
clinic_router.get('/bardata2',  renderBarGraphSuccessful);

//Profile Routes
clinic_router.get('/profile', renderProfile);
clinic_router.patch('/profile/:clinic_email', upload.none(),  updateProfile);


//Add service Routes
clinic_router.get('/services', renderServices);
clinic_router.post('/addservice', AddClinicService);
clinic_router.patch('/editservices/:service_id/:price/:description', updateService);
clinic_router.delete('/deleteservice/:service_id', DeleteClinicService);

//Branches Routes
clinic_router.get('/branches', renderBranches);
clinic_router.patch('/branches/:branch_id/:branch_address/:mobile_number/:license/:branch_image', upload.none(),  updateBranch);


//Transaction Routes
clinic_router.get('/transactions', renderTransactions);
clinic_router.get('/table', renderPayments);
clinic_router.post('/addtransaction', AddTransactions);
clinic_router.delete('/deletetransaction/:payment_id', DeleteTransaction);
clinic_router.patch('/confirmtransactions/:payment_id/:first_name/:last_name/:payment_date/:service_id/:payment_method_id/:amount', confirmTransactions);
clinic_router.patch('/edittransactions/:payment_id/:first_name/:last_name/:payment_date/:service_id/:payment_method_id/:amount', updateTransactions);



module.exports = { clinic_router };