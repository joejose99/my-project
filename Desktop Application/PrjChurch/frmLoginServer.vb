Imports System.IO
Imports System
Imports ADOX

Imports System.Data.OleDb
'Imports System.Data.SqlClient
Imports WindowsApplication1

Imports System.Collections

Imports System.Runtime.Serialization.Formatters.Binary
Imports System.Runtime.Serialization

Public Class frmLoginServer
    Private hey As Integer


    Private Sub frmLoginServer_Activated(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Activated
        Dim strServerName As String
        Dim strUserName As String
        Dim strDataBase As String
        Dim strpass As String
        Try


            If errTime > 0 Then
                Exit Sub
            End If


            strServerName = GetSetting("Church", "Database Con", "Server")
            strUserName = GetSetting("Church", "Database Con", "User")
            strDataBase = GetSetting("Church", "Database Con", "DataB")
            strpass = GetSetting("Church", "Database Con", "Pass")

            If Len(strServerName) <> 0 And Len(strUserName) <> 0 And Len(strDataBase) <> 0 Then

                strServerName = GetSetting("Church", "Database Con", "Server")
                strUserName = GetSetting("Church", "Database Con", "User")
                strDataBase = GetSetting("Church", "Database Con", "DataB")
                strpass = GetSetting("Church", "Database Con", "Pass")
                TextBox1.Text = strServerName
                TextBox1.Enabled = False

                textbox4.Text = strDataBase
                textbox4.Enabled = False

                TextBox2.Text = strUserName
                TextBox2.Enabled = False
                TextBox3.Text = strpass
                TextBox3.Enabled = False

                ' frmSplash.Visible = True
                'frmYouth.Show
                Me.Hide()
                Me.Visible = False
                'Dim logme As Form
                'logme = New frmLoginSever
                'logme.Visible = False
                'mdiChurch.Show()



                ' frmLogin.Show()

                splashscreen1.Show()
                hey = hey + 1

            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private Sub frmLoginServer_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Try

            My.Computer.FileSystem.CreateDirectory("C:\Program Files\My Church")

            Dim di As DirectoryInfo = New DirectoryInfo("C:\Program Files\My Church")
            ' Determine whether the directory exists.

            TextBox1.Text = "C:\Program Files\My Church"
            TextBox1.Enabled = False
            If di.Exists Then
                ' Indicate that it already exists.
                'MsgBox("That path exists already.")
                Exit Sub
            Else
                ' Try to create the directory.
                di.Create()
            End If

            TextBox1.Text = "C:\Program Files\My Church"

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try

    End Sub

    Private Sub butConnect_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butConnect.Click
        Try
            Dim admin As String = "admin"
            If hey > 0 Then
                Me.Visible = False
                Exit Sub
            End If
            Call conns()

            If Trim(Deri) & "" <> Trim(str_connection) & "" Then
                Me.Show()

            Else
                SaveSetting("Church", "Database Con", "Server", TextBox1.Text)
                SaveSetting("Church", "Database Con", "User", admin)
                SaveSetting("Church", "Database Con", "DataB", textbox4.Text)
                SaveSetting("Church", "Database Con", "Pass", TextBox3.Text)
                mdiChurch.Show()
                Me.Visible = False
                ' 

                'frmLogin.Show()
                splashscreen1.Show()
                splashscreen1.ControlBox = False
                splashscreen1.Show()
                splashscreen1.ControlBox = False
                'frmYouth.Show
                'Unload Me




            End If
            'Unload Me
            'If Deri <> conConnect.ConnectionString Then
            ' frmConnect.Show
            ' End If

            Exit Sub

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try

    End Sub

    Private Sub butEdit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butEdit.Click
        TextBox1.Enabled = True
        TextBox2.Enabled = True
        TextBox3.Enabled = True
        textbox4.Enabled = True
    End Sub

    Private Sub butCancel_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butCancel.Click
        Try
            'TextBox1.Text = ""
            TextBox2.Text = ""
            TextBox3.Text = ""
            textbox4.Text = ""

            butConnect.Enabled = True
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub Button2_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button2.Click
        Me.Close()
    End Sub

    Private Sub but_DB_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles but_DB.Click
        'Dim SQLSTR As String
        'Dim strConn As String
        Try
            Dim dblink As String


            If TextBox1.Text = "" Then
                MsgBox(" Data Source Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            If TextBox2.Text = "" Then
                MsgBox(" User Id Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            If textbox4.Text = "" Then
                MsgBox(" Database Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If




            Dim ADOXcatalog As New ADOX.Catalog
            Dim ADOXcatalog1 As New ADOX.Catalog
            Dim ADOXtable As New ADOX.Table
            Dim ADOXtable1 As New ADOX.Table
            Dim ADOXindex As New ADOX.Index





           

            dblink = TextBox1.Text & "\" & textbox4.Text & ".mdb"


            'ADOXcatalog.Create("Provider=Microsoft.Jet.OLEDB.4.0;Data Source=" & "c:\Church.mdb")


            'ADOXcatalog.Create("Provider=Microsoft.Jet.OLEDB.4.0;Data Source= " & dblink & "; Database=" & textbox4.Text & ";User Name=" & TextBox2.Text & ";Password=" & TextBox3.Text & ";")
            'ADOXcatalog.Create("Provider=Microsoft.Jet.OLEDB.4.0;Data Source=C:\mydatabase.mdb;Jet OLEDB:System Database=system.mdw;User ID=myUsername;Password=myPassword;")
            ADOXcatalog.Create(" Provider=Microsoft.Jet.OLEDB.4.0;Data Source=" & dblink & ";User Id=admin;Password=;")


            ADOXcatalog = Nothing

            ADOXtable = Nothing
            ADOXindex = Nothing





            MsgBox("You have Surcessfully Created Database " & textbox4.Text & "", MsgBoxStyle.DefaultButton1, "Information")

            Call createTable()





            ' str_connection = ""
            Dim admin As String = "admin"
            If errTime > 0 Then
                Me.Visible = False
                Me.Hide()

                SaveSetting("Church", "Database Con", "Server", TextBox1.Text)
                SaveSetting("Church", "Database Con", "User", admin)
                SaveSetting("Church", "Database Con", "DataB", textbox4.Text)
                SaveSetting("Church", "Database Con", "Pass", TextBox3.Text)


                Exit Sub
            End If
            SaveSetting("Church", "Database Con", "Server", TextBox1.Text)
            SaveSetting("Church", "Database Con", "User", admin)
            SaveSetting("Church", "Database Con", "DataB", textbox4.Text)
            SaveSetting("Church", "Database Con", "Pass", TextBox3.Text)

            Me.Visible = False
            Me.Hide()

            'frmLogin.Show()

            splashscreen1.Show()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private ctr As Integer = 0
    
    Private Sub createTable()
        Try
            conns()
            Dim SQLSTR As String


            SQLSTR = " create table Church " & _
           "( " & _
           "id integer identity ," & _
           "vMemberId varchar (20)not null," & _
           "vSurname varchar(25) not null," & _
           "vFname varchar (25) not null," & _
            "vMidName varchar(25), " & _
            "vGender varchar(10), " & _
            "vAddress varchar(150), " & _
           "vEmail  varchar(30)," & _
            " vMobile varchar(30), " & _
           "vHPhone varchar(30)," & _
            "vLocation  varchar(50)," & _
             "vBus_Stop  varchar(30)," & _
             "vProfesion  varchar(50)," & _
             "vAdultChild  varchar(50)," & _
               "vState  varchar(50)," & _
               "vGenerate varchar(50)," & _
             "vAddresDec  varchar(150)," & _
             "vNoOfDpt Varchar(20)," & _
            "dbirthdate datetime," & _
            "vAuto  varchar(50)," & _
            "ddate datetime," & _
            "vOver1  varchar(50)," & _
            "vOver2 varchar(50)," & _
            "vOver3  varchar(50)," & _
            "vOver4  varchar(50)," & _
            "vOver5  varchar(50)," & _
            "vOver6 varchar(30)" & _
            ")"

            ctr += 1

            comUserSelectS = New OleDbCommand(SQLSTR, strconss)
            comUserSelectS.ExecuteNonQuery()


            strconss.Close()

            conns()
            SQLSTR = ""

            SQLSTR = " Create table Offering" & _
                      "( " & _
                      "id int identity ," & _
                     "dpaydate varchar(30)," & _
                     "mAmount money," & _
                     "vName varchar(30)," & _
                     "vUser_Name varchar(30)," & _
                     "vYear varchar(50)," & _
                     "vMonth varchar(50)," & _
                     "vUser varchar(50)," & _
                     "vOver varchar(30)," & _
                     "vOver1 varchar(30)," & _
                    " vdescrib varchar(150)" & _
                     ")"

            ctr += 1
            comUserSelectS = New OleDbCommand(SQLSTR, strconss)
            comUserSelectS.ExecuteNonQuery()
            strconss.Close()

            conns()
            SQLSTR = ""

            SQLSTR = "create table DepartMember" & _
             "( " & _
             "id int identity," & _
             "vDepartCode varchar (20), " & _
             "vDepartName varchar (40)," & _
             "vMemberId  varchar(20)," & _
             "vFName  varchar(25)," & _
             "vSurname varchar(25)," & _
             "vHeadofDepartId varchar (30) ," & _
             "vOver1 varchar (25) ," & _
              "vOver2 varchar (50) ," & _
            "vOver3 varchar (50) ," & _
            "vOver4 varchar (50) ," & _
              "ddate datetime," & _
             "vOver5 varchar(15)" & _
             ")"

            ctr += 1

            comUserSelectS = New OleDbCommand(SQLSTR, strconss)
            comUserSelectS.ExecuteNonQuery()
            strconss.Close()

            conns()
            SQLSTR = ""
            SQLSTR = " Create table Tithe" & _
                    "( " & _
                    "id int identity ," & _
                   "dpaydate varchar(30)," & _
                   "mAmount money," & _
                   "vFName varchar(30)," & _
                   "vSurName varchar(30)," & _
                   "vUser_Name varchar(30)," & _
                   "vMemberId varchar(30)," & _
                    "vYear varchar(50)," & _
                     "vMonth varchar(50)," & _
                      "vUser varchar(50)," & _
                     "vAuto varchar(25)," & _
                   "vOver1 varchar(30)," & _
                  " vdescrib varchar(150)" & _
                   ")"
            ctr += 1
            comUserSelectS = New OleDbCommand(SQLSTR, strconss)
            comUserSelectS.ExecuteNonQuery()

            strconss.Close()

            conns()
            SQLSTR = ""
            SQLSTR = " Create table Comment" & _
                    "( " & _
                    "id int identity ," & _
                   "dpaydate varchar(30)," & _
                   "mAmount money," & _
                   "vUser_Name varchar(30)," & _
                   "vYear varchar(50)," & _
                     "vMonth varchar(50)," & _
                      "vUser varchar(50)," & _
                     "vAuto varchar(25)," & _
                   "vOver1 varchar(30)," & _
                  " vdescrib varchar(150)" & _
                   ")"
            ctr += 1
            comUserSelectS = New OleDbCommand(SQLSTR, strconss)
            comUserSelectS.ExecuteNonQuery()

            strconss.Close()

            conns()
            SQLSTR = ""
            SQLSTR = "create table Department " & _
            "( " & _
            "id int identity," & _
            "vDepartCode varchar (20), " & _
            "vDepartName varchar (40)," & _
            "vHeadofDepartName  varchar(30)," & _
            "vMemberId varchar (25) ," & _
            "ddate datetime," & _
            "vOver1  varchar(20)," & _
            "vOver2 varchar(30)," & _
            "vOver3 varchar(15)" & _
            ")"
            ctr += 1



            comUserSelectS = New OleDbCommand(SQLSTR, strconss)
            comUserSelectS.ExecuteNonQuery()

            conns()
            SQLSTR = ""
            SQLSTR = " Create table FinPledge" & _
                    "( " & _
                    "id int  identity," & _
                   "dpaydate varchar(30)," & _
                   "mAmount money," & _
                   "vName varchar(30)," & _
                   "vSurName varchar(30)," & _
                   "vFName varchar(30)," & _
                    "vYear varchar(50)," & _
                     "vMonth varchar(50)," & _
                     "vAuto varchar(25)," & _
                   "vUser_Name varchar(30)," & _
                   "vMemberId varchar(30)," & _
                   "vPhoneNo varchar(30)," & _
                    "vUser varchar(50)," & _
                   "vOver1 varchar(30)," & _
                   "vOver2 varchar(30)," & _
                   "vOver3 varchar(30)," & _
                  " vPurpose varchar(150)" & _
                   ")"
            ctr += 1
            comUserSelectS = New OleDbCommand(SQLSTR, strconss)
            comUserSelectS.ExecuteNonQuery()

            strconss.Close()



            conns()
            SQLSTR = ""
            SQLSTR = " Create table RedPledge" & _
                    "( " & _
                    "id int identity ," & _
                   "dpaydate varchar(30)," & _
                   "mAmount money," & _
                   "vsurName varchar(30)," & _
                   "vFName varchar(30)," & _
                   "vYear varchar(50)," & _
                   "vAuto varchar(25)," & _
                     "vMonth varchar(50)," & _
                      "vUser varchar(50)," & _
                   "vUser_Name varchar(30)," & _
                   "vMemberId varchar(30)," & _
                   "vPhoneNo varchar(30)," & _
                   "vOver1 varchar(30)," & _
                   "vOver2 varchar(30)," & _
                   "vOver3 varchar(30)," & _
                  " vPurpose varchar(150)" & _
                   ")"
            ctr += 1
            comUserSelectS = New OleDbCommand(SQLSTR, strconss)
            comUserSelectS.ExecuteNonQuery()

            strconss.Close()


            conns()
            SQLSTR = ""
            SQLSTR = " Create table Income" & _
                    "( " & _
                    "id int  identity," & _
                   "dpaydate varchar(30)," & _
                   "mAmount money," & _
                   "vName varchar(30)," & _
                   "vUser_Name varchar(30)," & _
                   "vAmountInWd varchar(150)," & _
                   "vPayment_Type varchar(150)," & _
                    "vYear varchar(50)," & _
                     "vMonth varchar(50)," & _
                      "vUser varchar(50)," & _
                   "vOver1 varchar(30)," & _
                   "vOver2 varchar(30)," & _
                  " vdescrib varchar(150)" & _
                   ")"
            ctr += 1
            comUserSelectS = New OleDbCommand(SQLSTR, strconss)
            comUserSelectS.ExecuteNonQuery()

            strconss.Close()

            conns()
            SQLSTR = ""
            SQLSTR = " Create table Expenses" & _
                    "( " & _
                    "id int  identity," & _
                   "dpaydate varchar(30)," & _
                   "mAmount money," & _
                   "vName varchar(30)," & _
                   "vUser_Name varchar(30)," & _
                   "vAmountInWd varchar(150)," & _
                    "vYear varchar(50)," & _
                     "vMonth varchar(50)," & _
                      "vUser varchar(50)," & _
                   "vOver1 varchar(30)," & _
                   "vOver2 varchar(30)," & _
                  " vdescrib varchar(150)" & _
                   ")"
            ctr += 1
            comUserSelectS = New OleDbCommand(SQLSTR, strconss)
            comUserSelectS.ExecuteNonQuery()

            strconss.Close()


            conns()
            SQLSTR = ""
            SQLSTR = " Create table MatePledges" & _
                    "( " & _
                    "id int  identity," & _
                   "dpaydate varchar(30)," & _
                   "vFName varchar(30)," & _
                   "vSurName varchar(30)," & _
                   "vUser_Name varchar(30)," & _
                   "vItems varchar(150)," & _
                   "vMemberId varchar(30)," & _
                   "vPhoneNo varchar(30)," & _
                    "vOver1 varchar(30)," & _
                   "vOver2 varchar(30)," & _
                  " vdescrib varchar(150)" & _
                   ")"
            ctr += 1
            comUserSelectS = New OleDbCommand(SQLSTR, strconss)
            comUserSelectS.ExecuteNonQuery()

            strconss.Close()


            conns()
            SQLSTR = ""
            SQLSTR = "Create table acct" & _
                 "( " & _
            "id int identity," & _
            "mBalance money," & _
            "mSalary money," & _
            "mIncome money," & _
            "mOffering money," & _
            "mTithe money," & _
            "mPledges money," & _
            "mOtherExp money " & _
            ")"
            ctr += 1
            comUserSelectS = New OleDbCommand(SQLSTR, strconss)
            comUserSelectS.ExecuteNonQuery()

            strconss.Close()

            conns()
            SQLSTR = ""
            SQLSTR = " Create table CurrentDate" & _
            "( " & _
            "id int identity ," & _
            "dStDate datetime," & _
            "dCurDate datetime," & _
            "vDays varchar(10)" & _
             ")"
            ctr += 1
            comUserSelectS = New OleDbCommand(SQLSTR, strconss)
            comUserSelectS.ExecuteNonQuery()

            strconss.Close()


            conns()
            SQLSTR = ""
            SQLSTR = " Create table Login" & _
            "( " & _
            "id int identity ," & _
            "vuserName varchar (15)," & _
            "vPassoward varchar (15)," & _
            "vRole varchar (20)," & _
              "vActtionE varchar(15)," & _
               "vActtionExp varchar (15)," & _
               "vActtionLoc varchar(15)," & _
            "dDate datetime" & _
             ")"
            ctr += 1
            comUserSelectS = New OleDbCommand(SQLSTR, strconss)
            comUserSelectS.ExecuteNonQuery()


            strconss.Close()



            conns()
            SQLSTR = ""
            SQLSTR = " Create table School_Name" & _
            "( " & _
            "id int  identity," & _
            "vSC_Name varchar (255)" & _
             ")"
            ctr += 1
            comUserSelectS = New OleDbCommand(SQLSTR, strconss)
            comUserSelectS.ExecuteNonQuery()


            strconss.Close()


            conns()
            SQLSTR = ""
            SQLSTR = " Create table Currency1" & _
            "( " & _
            "id int identity ," & _
            "vSC_Name varchar (255)" & _
             ")"
            ctr += 1
            comUserSelectS = New OleDbCommand(SQLSTR, strconss)
            comUserSelectS.ExecuteNonQuery()


            strconss.Close()


            strconss.Close()

            conns()
            SQLSTR = ""
            SQLSTR = "Create table Salary " & _
                 "( " & _
            "id int identity ," & _
            "vSurname varchar(25) not null," & _
            "vFname varchar (25) not null," & _
            "vMidName varchar(25) ," & _
            "vEmpid varchar (20)," & _
            "vMonth varchar (50)," & _
            "vYear varchar (50)," & _
            "mSalary money," & _
            "vGender varchar(10)," & _
            "vPosition varchar(45)," & _
            "vDepartStaffCode varchar(15)," & _
            "vmodofpay varchar(40)," & _
            "vpayStatus varchar(40)," & _
           " vStatus varchar(40)," & _
            "vUser varchar(50)," & _
            "dSalDate DateTime " & _
            ")"

            ctr += 1
            comUserSelectS = New OleDbCommand(SQLSTR, strconss)
            comUserSelectS.ExecuteNonQuery()

            strconss.Close()


            conns()
            SQLSTR = ""
            SQLSTR = "Create table Positions" & _
                 "( " & _
            "id int identity," & _
            "vPosCode varchar (15)," & _
            "vSalGrade varchar(25)," & _
            "vAuto varchar(25)," & _
            "vPosition varchar(45)," & _
           "vDepartStaffCode varchar(15)," & _
            "mSalary money," & _
            "vTeachingStaff varchar(30)," & _
            "dDate varchar(80) " & _
            ")"

            ctr += 1
            comUserSelectS = New OleDbCommand(SQLSTR, strconss)
            comUserSelectS.ExecuteNonQuery()

            strconss.Close()

            conns()
            SQLSTR = ""

            SQLSTR = "create table EMPLOYEE " & _
           "( " & _
           "id int identity ," & _
           "vEmpid varchar (20)not null," & _
           "vSurname varchar(25) not null," & _
           "vFname varchar (25) not null," & _
            "vMidName varchar(25), " & _
            "vPosCode varchar(15)," & _
            "vAddress varchar(150), " & _
           "vEmail  varchar(30)," & _
            "vMobile varchar(30), " & _
           "vHPhone varchar(30)," & _
            "vQualif  varchar(30)," & _
            "vGrade  varchar(30)," & _
            "dEmpBdate  varchar(80)," & _
            "dEmpdate  varchar(80)," & _
            "vHow_Know  varchar(30)," & _
            "vProfession  varchar(30)," & _
            "vLSch_Attended  varchar(40)," & _
            "vSalGrade varchar(25)," & _
            "vAuto varchar(25)," & _
            "vGender varchar(10)," & _
            "vDepartStaffCode varchar (15)," & _
            "vnextofkindsMobile varchar(30)," & _
            "vNear_to_kinAdd Varchar(200)," & _
            "vNear_to_kin varchar(30)" & _
            ")"


            ctr += 1

            comUserSelectS = New OleDbCommand(SQLSTR, strconss)
            comUserSelectS.ExecuteNonQuery()
            strconss.Close()

            conns()
            SQLSTR = ""
            SQLSTR = "create table DepartStaff " & _
                 "( " & _
            "id int identity ," & _
            "vDepartStaffCode varchar (15)constraint pkDepat primary key clustered not null, " & _
            "vDepartName varchar (40)," & _
            "vEmpid varchar (20) ," & _
            "vFname varchar (25) not null," & _
           " dDate varchar (80) " & _
            ")"
            ctr += 1
            comUserSelectS = New OleDbCommand(SQLSTR, strconss)
            comUserSelectS.ExecuteNonQuery()


            strconss.Close()

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    
End Class