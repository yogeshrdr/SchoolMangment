
window.onload = function() {
  window.tour = new Tour({
    padding: 0,
    nextText: 'More',
    doneText: 'Finito',
    prevText: 'Less',
    tipClasses: 'tip-class active',
    steps: [
      {
        element: ".dashboard",
        title: "Welcome!!!",
        description: "This is the admin home page or dashboard, click on next button to see what we have you",
        position: "right"
      },
      {
        element: ".enquiry",
        title: "Academics",
        description: "There are so many things to be done under this menu. The below are what you can do under academics:<br> <b>Enquiry Category:</b> This is where admin will category that will enable users or visitor to select from contact page or enquiry page in the software website.<br>Other things can be done under academics are: <b>Approval of parents product sales</b>, <b>help link</b>, <b>generate result PIN for students</b>, <b>school clubs</b>, <b>circular</b>, <b>manage help desk</b>, <b>holiday</b>, <b>moral talks and others.</b>",
        data: "Custom Data",
        position: "right"
      },
     {
        element: ".task_manager",
        title: "Task Manager",
        description: "This allows admin to create task for students. Here, there is running and archive task. Running task show task that are yet to be completed. Here also, timer can set for student to compete the task and task progress is also available the monitor the progress of the task. Admin can also assign task to more than one or two or more students at the same time. Click to see features!!!",
        position: "right"
      },
      {
        element: ".staff",
        title: "Manage Staff",
        description: "Here, this is where admin can add Teachers, Librarian, Acoountants, Hostel Managers and Human Resource Managers.",
        position: "right"
      },
      {
        element: ".student",
        title: "Manage Student",
        description: "This sidebar, allows admin to admit new students, promote students and list all the students by class, section and others.",
        position: "right"
      },
	  {
        element: ".attendance",
        title: "Student Attendance",
        description: "This sidebar, allows admin to Mark student attendance, view staff attendace and generate attendance reports.",
        position: "right"
      },
	  {
        element: ".ticket",
        title: "Support Ticket",
        description: "This sidebar, allows admin to create new ticket for students and also list all tickects and manage the tickets.",
        position: "right"
      },
	  {
        element: ".collect_fee",
        title: "Collection of Fees",
        description: "Here, admin can generate payment for students, admin can also generate invoice and send invoice to student email, admin can also create ledger for students, take payment manually and others.",
        position: "right"
      }
    ]
  })

  tour.override('showStep', function(self, step) {
    self(step);
  })

  tour.override('end', function(self, step) {
    self(step);
  })

  tour.start();
}
