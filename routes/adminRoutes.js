const express = require('express');
const multer = require('multer');
const admin_router = express.Router();
const storage = multer.diskStorage({
    destination: function(req, file, cb){
        cb(null, './uploads');
    },
    filename: function (req, file, cb){
        cb(null, file.originalname);
    },
});
const request_storage = multer.diskStorage({
    destination: function(req, file, cb){
        cb(null, './uploads/uploads-request');
    },
    filename: function (req, file, cb){
        cb(null, file.originalname);
    },
});
const upload = multer({ storage });
const upload_request = multer({ request_storage });
const {  acceptBranch, deleteBranchRequest, acceptService, deleteServiceRequest, deleteClinicRequest, acceptClinic, deleteClinics, renderClinicData, deletePatients, renderPatientData, renderMonthlyIncome,  renderDailyIncome, renderAdminDynamicTable, renderAllSuccessfulAppointmentsGraph, 
        renderAllAppointmentsGraph, renderAdminHomepage, changeRequestController } = require('../Controllers/adminController');
const { DeleteBranchRequest, EditBranchRequest, AddBranchRequest, NewClinicService } = require('../Controllers/clinicController');

//Homepage

admin_router.get('/homepage', renderAdminHomepage);
admin_router.get('/dailyincomedata', renderDailyIncome);
admin_router.get('/monthlyincomedata', renderMonthlyIncome);
admin_router.get('/appbardata', renderAllAppointmentsGraph);
admin_router.get('/okappbardata', renderAllSuccessfulAppointmentsGraph);
admin_router.get('/admin-dynamic-table/:category', renderAdminDynamicTable);

//Patient Data

admin_router.get('/patient-data', renderPatientData);
admin_router.delete('/delete-user/:user_id', deletePatients);

//Clinic Data

admin_router.get('/clinic-data', renderClinicData);
admin_router.delete('/delete-clinic/:clinic_id', deleteClinics);




//REQUESTS

admin_router.post('/accept-branch', acceptBranch);
admin_router.post('/delete-branch-request', deleteBranchRequest);

admin_router.post('/accept-service', acceptService);
admin_router.post('/delete-service-request', deleteServiceRequest);

admin_router.post('/accept-clinic', acceptClinic);
admin_router.post('/delete-clinic-request', deleteClinicRequest);

admin_router.post('/changerequest', changeRequestController);

admin_router.post('/addservicerequest', NewClinicService);

admin_router.post('/addbranchrequest', AddBranchRequest);
admin_router.post('/editbranchrequest', EditBranchRequest);
admin_router.post('/deletebranchrequest', DeleteBranchRequest);

admin_router.post('/uploads', upload.fields([{name: 'branch_image'}, {name: 'license'}]), (req, res) => {
    try {
      console.log(req.files);
    } catch (error) {
        console.error(error.message);
        res.status(500).send('Error uploading files!');
    }
  });

  admin_router.post('/uploads/branch-request', upload_request.fields([{name: 'branch_image'}, {name: 'license'}]), (req, res) => {
    try {
      console.log(req.files);
    } catch (error) {
        console.error(error.message);
        res.status(500).send('Error uploading files!');
    }
  });
  admin_router.post('/uploads/branch-request', upload_request.fields([{name: 'branch_image'}, {name: 'license'}]), (req, res) => {
    try {
      console.log(req.files);
    } catch (error) {
        console.error(error.message);
        res.status(500).send('Error uploading files!');
    }
  });



module.exports = {admin_router};