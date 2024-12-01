const Clinic = require('../Models/clinicModel');
const Admin = require('../Models/adminModel');
const ChartJS = require('chart.js');
const admin = new Admin();
const clinic = new Clinic();

async function changeRequestController(req, res){
    const {clinic_id, new_clinic_address, new_clinic_name, new_license_code, file_id} = req.body;
  
    try{
      clinic.changeRequest(clinic_id, new_clinic_address, new_clinic_name, new_license_code, file_id, status = 'Pending');
      
    }catch(error){
        console.error(error.message);
    }
  }

async function renderAdminHomepage(req, res){

  res.render('admin/homepage', { cssFile: "/admin_homepage.css", categories : ['Branches', 'Services', 'Accounts']});
}


async function renderDailyIncome(req, res){
  try{
      const rows = await admin.calculateDailyIncome();

      const chartData = {
          labels: rows.map(row => row.day),
          datasets: [{
            label: 'Daily Income',
            data: rows.map(row => row.income),
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
          }]
        };
        
        res.json(chartData);
      }catch(error){
          console.error(error.message);
          throw error; 
      }
}
async function renderMonthlyIncome(req, res){
  try{
      const rows = await admin.calculateMonthlyIncome();

      const chartData = {
          labels: rows.map(row => row.month),
          datasets: [{
            label: 'Monthly Income',
            data: rows.map(row => row.income),
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
          }]
        };
        
        res.json(chartData);
      }catch(error){
          console.error(error.message);
          throw error; 
      }
}

async function renderAllAppointmentsGraph(req, res){
    try{
        const rows = await admin.countAllAppointments();

        const chartData = {
            labels: rows.map(row => row.service_name),
            datasets: [{
              label: 'Total Appointments',
              data: rows.map(row => row.count),
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
              ],
              borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
              ],
              borderWidth: 1
            }]
          };
          
          res.json(chartData);
        }catch(error){
            console.error(error.message);
            throw error; 
        }
}
async function renderAllSuccessfulAppointmentsGraph(req, res){
    try{
        const rows = await admin.allSuccessfulAppointments();
  
        const chartData = {
            labels: rows.map(row => row.service_name),
            datasets: [{
              label: 'Total Appointments',
              data: rows.map(row => row.count),
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
              ],
              borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
              ],
              borderWidth: 1
            }]
          };
          
          res.json(chartData);
        }catch(error){
            console.error(error.message);
            throw error; 
        }
}
async function renderAdminDynamicTable(req, res){
  const categories = req.params.category;
  let tableData;
  switch(categories){
    case 'Branches':
      tableData = await admin.allBranchesRequest();
      break;
    case 'Services':
      tableData = await admin.allServicesRequest();
      break;
    case 'Accounts':
    tableData = await admin.allAccountsRequest();
    break;
    default:
      tableData = [];
  }
  res.json(tableData);
}

async function renderClinicData(req, res){

  const clinics = await admin.getAllClinicData();
  
  res.render('admin/clinic_data', { cssFile: '/tables.css', clinics});

}

async function renderPatientData(req, res){

  const patients = await admin.getAllPatientsData();
  
  res.render('admin/patient_data', { cssFile: '/tables.css', patients});

}

async function deletePatients(req, res){
  const { user_id } = req.params;
  try{
    await admin.deletePatient(user_id);
    renderPatientData(req,res);

  }catch(error){
    console.error(error.message);
  }
}

async function deleteClinics(req, res){
  const { clinic_id } = req.params;
  try{
    await admin.deleteClinic(clinic_id);
    renderClinicData(req,res);

  }catch(error){
    console.error(error.message);
  }
}

async function acceptBranch(req, res){
  const { pendingId, branchAddress, mobileNumber, license, clinicName } = req.body;

  try{
    await admin.deleteBranchRequest(pendingId);
    await admin.acceptBranch(branchAddress, mobileNumber, license, clinicName);
    res.redirect('/admin/homepage');

  }catch(error){
    console.error(error.message);
  }
}async function deleteBranchRequest(req, res){
  const { pendingId } = req.body;
  console.log(pendingId);
  try{
    await admin.deleteBranchRequest(pendingId);
    res.redirect('/admin/homepage')

  }catch(error){
    console.error(error.message);
  }
}

async function acceptService(req, res){
  const { pendingId, serviceName, Price } = req.body;

  console.log(pendingId, serviceName, Price);
  try{
    await admin.deleteServiceRequest(pendingId);
    await admin.acceptServices(serviceName, Price);
    res.redirect('/admin/homepage');

  }catch(error){
    console.error(error.message);
  }
}async function deleteServiceRequest(req, res){
  const { pendingId } = req.body;
  console.log(pendingId);
  try{
    await admin.deleteServiceRequest(pendingId);
    res.redirect('/admin/homepage')

  }catch(error){
    console.error(error.message);
  }
}
async function acceptClinic(req, res){
  const { pendingId, clinicName, clinicEmail, clinicAddress, village, postcode, password, mobileNumber } = req.body;
  console.log( pendingId, clinicName, clinicEmail, clinicAddress, village, postcode, password, mobileNumber);
  try{
    await admin.deleteClinicRequest(pendingId);
    await admin.acceptClinics(clinicName, clinicEmail, clinicAddress, village, postcode, password, mobileNumber);
    res.redirect('/admin/homepage')

  }catch(error){
    console.error(error.message);
  }
}
async function deleteClinicRequest(req, res){
  const { pendingId } = req.body;
  console.log(pendingId);
  try{
    await admin.deleteClinicRequest(pendingId);
    res.redirect('/admin/homepage')

  }catch(error){
    console.error(error.message);
  }
}



  module.exports = {  acceptBranch, deleteBranchRequest, acceptService, deleteServiceRequest, deleteClinicRequest, acceptClinic, deleteClinics, renderClinicData, deletePatients, renderPatientData, renderDailyIncome,  renderMonthlyIncome, renderAdminDynamicTable, renderAllSuccessfulAppointmentsGraph, renderAllAppointmentsGraph, renderAdminHomepage, changeRequestController };