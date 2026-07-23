Imports System.IO
Imports System
Imports ADOX

Imports System.Data.OleDb
'Imports System.Data.SqlClient
Imports WindowsApplication1

Imports System.Collections

Imports System.Runtime.Serialization.Formatters.Binary
Imports System.Runtime.Serialization






Public Class frmBack


    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        'Shows how to create an Access 2000 database and append tables, fields, indexes using ADOX. Don't forget
        'a reference to ADOX (Microsoft ADO Ext. 2.x for DDL and Security)
        'Try

        On Error Resume Next
        Dim strDataBase As String

        strDataBase = GetSetting("Church", "Database Con", "DataB")

        On Error Resume Next
        strDataBase = strDataBase & "" & ".mdb"

        On Error Resume Next


        TextBox1.Text = "C:\Program Files\My Church"

        On Error Resume Next
        TextBox1.Text = "C:\Program Files\My Church\" & "" & strDataBase

        On Error Resume Next
        Dim destination As String = "C:\My Church\" & "" & strDataBase

        On Error Resume Next
        'Dim di As IO.DirectoryInfo = New IO.DirectoryInfo(destination)
        'Dim di As DirectoryInfo = New DirectoryInfo("C:\My Church")


        TextBox1.Enabled = False


        My.Computer.FileSystem.DeleteFile(destination)

        On Error Resume Next

        ProgressBar1.Value = 0

        On Error Resume Next
        My.Computer.FileSystem.CopyFile(TextBox1.Text, destination)

        On Error Resume Next
        Me.Button1.Enabled = False


        On Error Resume Next
        MsgBox("Data been Back Up", MsgBoxStyle.DefaultButton1, "Back Up File")


        Exit Sub
        ' Catch Exp As OleDb.OleDbException
        ' MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        'Catch Exp As Exception
        ' MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        'End Try

        ' Me.Button2.Enabled = True
        'Me.Button1.Enabled = False

    End Sub

    'Private ADOXcatalog As New ADOX.Catalog
    'Private ADOXtable As New ADOX.Table
    Private AdoXEmp As New ADOX.Table
    Private AdoXEmpcat As New ADOX.Catalog
    'Private ADOXindex As New ADOX.Index
    Private ADOXindexEmp As New ADOX.Index
    Private conConnect As String
    Private strconss As New OleDb.OleDbConnection
    Private comUserSelectS As OleDbCommand
    Private Sub conHav()
        'AdoXEmpcat.ActiveConnection = _
        ' "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=" _
        '& "c:\newdata.mdb"
        Try

            Dim ConnStr As String = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=" _
                    & "c:\University.mdb"
            Dim oConn As New OleDb.OleDbConnection(ConnStr)
            oConn.Open()
            strconss = oConn
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
   



    Private Sub frmBack_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Try
            Me.MdiParent = mdiChurch
            Me.Top = 100
            Me.Left = 0

            ProgressBar1.Visible = False
            Label2.Text = ""

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub




    Private Sub Button3_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button3.Click
        Me.Close()
    End Sub
End Class