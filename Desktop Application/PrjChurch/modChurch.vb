Imports System.Data.SqlClient
Imports System.Math
Imports System.IO


Imports ADOX
Imports System
Imports System.Data.OleDb
'Imports System.Data.SqlClient
Imports WindowsApplication1

Imports System.Collections

Imports System.Runtime.Serialization.Formatters.Binary
Imports System.Runtime.Serialization
Module modChurch






    Public str_sql_user_select As String
    Public str_connection As String
    Public mycon As SqlConnection
    Public comUserSelect As SqlCommand
    Public myreader As SqlDataReader
    Public rd As SqlDataReader
    Public course As String
    Public reg As String
    Public reg1 As String
    Public splashs As Integer
    Public regs As Integer
    Public Deri As String
    Public adm As String
    Public SQLSTR1 As String
    Public logTeacher As String
    Public errTime As Integer
    Public School_name As String
    Public ctrTran As String
    ' Public myAccessReader As OleDbDataReader
    ' Public counts As Integer
    ' Public CurrentDate As Date
    Public StartDate, CurrentDate As String
    Public tp As Integer
    Public intJoe As Integer
    Public UserN As String
    Public ids(tp) As Integer



    Public Adult As String
    Public Children As String

    Public AdoXEmp As New ADOX.Table
    Public AdoXEmpcat As New ADOX.Catalog
    'Private ADOXindex As New ADOX.Index
    Public ADOXindexEmp As New ADOX.Index
    Public conConnect As String
    Public strconss As New OleDb.OleDbConnection
    Public comUserSelectS As OleDbCommand


    Public myAccessReader As OleDbDataReader
   






    Public Sub conns()

       
        Try

            Children = "Children Church"
            Adult = "Adult Church"


            'ProgressBar1.Value = 0

            'TextBox1.Text = "c:\University.mdb"
            'str_connection = "Data Source=.;Initial Catalog=School;Integrated Security=True"
            'mycon = New SqlConnection(str_connection)

            'str_connection = "User Id =" & frmLoginSever.TextBox2.Text & "; Password = " & frmLoginSever.TextBox3.Text & "; Data Source=" & frmLoginSever.TextBox1.Text & ";Database =" & frmLoginSever.textbox4.Text & ""
            'mycon = New SqlConnection(str_connection)


            '$$$$$$$$$$$$$$$$$$$
            'Provider=Microsoft.Jet.OLEDB.4.0;Data Source=C:\mydatabase.mdb;Jet OLEDB:Database Password=MyDbPassword;
            'Some reports of problems with password longer than 14 characters. Also that some characters might cause trouble. If you are having problems, try change password to a short one with normal characters.

            '$$$$$$$$$$$$$$$$$$$$$$$$$$$$44444444

            '###########################
            'Workgroup (system database)
            'Provider=Microsoft.Jet.OLEDB.4.0;Data Source=C:\mydatabase.mdb;Jet OLEDB:System Database=system.mdw;

            '###########################

            '###########################
            'Workgroup (system database) specifying username and password
            'Provider=Microsoft.Jet.OLEDB.4.0;Data Source=C:\mydatabase.mdb;Jet OLEDB:System Database=system.mdw;User ID=myUsername;Password=myPassword;

            '###########################

            '###########################
            'DataDirectory(functionality)
            'Provider=Microsoft.Jet.OLEDB.4.0;Data Source=|DataDirectory|\myDatabase.mdb;User Id=admin;Password=;

            '###########################




            '#####################
            'NET WORK LOCATION
            'Provider=Microsoft.Jet.OLEDB.4.0;Data Source=\\serverName\shareName\folder\myDatabase.mdb;User Id=admin;Password=;
            '###########################


            
            'Dim ConnStr As String = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=" _
            '  & "c:\University.mdb"
            Dim dblink As String
            dblink = frmLoginServer.TextBox1.Text & "\" & frmLoginServer.textbox4.Text & ".mdb"

            str_connection = "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=  " & dblink & ";"

            Dim oConn As New OleDb.OleDbConnection(str_connection)
            Dim strconnect As String
            strconnect = frmLoginServer.TextBox1.Text

            oConn.Open()
            strconss = oConn
            Deri = str_connection

            'MsgBox("File for Back Up has been Created", MsgBoxStyle.DefaultButton1, "Information")



            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
       
            frmLoginServer.Show()
            'frmLoginServer.TextBox1.Text = ""
            frmLoginServer.TextBox2.Text = ""
            frmLoginServer.TextBox3.Text = ""
            frmLoginServer.textbox4.Text = ""
            frmLoginServer.Visible = False
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")

        End Try
    End Sub

End Module
