Imports System.Data.OleDb
Public Class frmEmpDepart

    Private Sub btngo_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btngo.Click
        Try

            Call stAdd()


            'Instantiate the connection object   
            'mycon = New SqlConnection(str_connection)


            'Instantiate the command object 
            'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

            'TextBox1.Text = ""
            'TextBox2.Text = ""
            'Opening a Connection with the Open() method 

            'mycon.Open()


            'Creating a DataReader object by using  
            'the ExecuteReader() method of the Command object.  

            'myreader = comUserSelect.ExecuteReader

            'If (myreader.Read = True) Then
            'TextBox1.Text = myreader(0)
            'TextBox2.Text = myreader(1)
            'Else
            'MsgBox("You have reached eof")
            ' End If






            ' (connectionstring())

            'If myConnection.State = ConnectionState.Open Then
            ' myConnection.Close()
            'End If
            'myConnection.Open()


            If txtCCode.Text = "" Then

                MsgBox("Department Code No Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If


            'If txtSem.Text = "" Then

            'MsgBox("Employee Id  Can not be Empty", MsgBoxStyle.Information, "Information")
            'Exit Sub
            ' End If


            ' If txtSec.Text = "" Then

            ' MsgBox("Head of Department Can not be Empty", MsgBoxStyle.Information, "Information")
            'Exit Sub
            'End If

            If txtCourseName.Text = "" Then

                MsgBox("Department Name Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If


            Dim dateapp As String


            dateapp = CStr(DateTimePicker1.Value)
            Dim sqlString As String = ""
            sqlString = "INSERT INTO  [departStaff]([vDepartStaffCode],[vDepartName],vFname,vEmpid, [dDate]) VALUES(" & _
             "'" & Me.txtCCode.Text.Trim & "'" & "," & _
             "'" & Me.txtCourseName.Text.Trim & "'" & "," & _
             "'" & Me.txtSec.Text & "'" & "," & _
             "'" & Me.txtSem.Text.Trim & "'" & "," & _
             "'" & dateapp & "'" & ")"
            'End Select
            comUserSelectS = New OleDbCommand(sqlString, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()


            strconss.Close()
            MsgBox("Data has been Saved", MsgBoxStyle.DefaultButton1, "Information")

            Me.txtCCode.Text = ""

            Me.txtCourseName.Text = ""
            Me.txtSec.Text = ""
            Me.txtSem.Text = ""
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Public Sub stAdd()
        Try

            Call conns()
            str_sql_user_select = "SELECT * FROM departStaff"


        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub butExit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butExit.Click
        Me.Close()
    End Sub

    Private Sub txtSem_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles txtSem.TextChanged

    End Sub

    Private Sub btnReset_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnReset.Click
        txtSem.Text = ""
        txtCourseName.Text = ""
        txtCCode.Text = ""
        txtSec.Text = ""
    End Sub

    Private Sub frmEmpDepart_Activated(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Activated
        Me.Left = 0
        Me.Top = 100
        Me.Width = 611
        Me.Height = 222
        Me.MdiParent = mdiChurch
    End Sub

    Private Sub frmEmpDepart_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Click
        Me.BringToFront()
    End Sub

    Private Sub frmEmpDepart_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Me.Left = 0
        Me.Top = 100
        Me.Width = 611
        Me.Height = 222
        Me.MdiParent = mdiChurch
        txtSem.Text = ""
        txtCourseName.Text = ""
        txtCCode.Text = ""
        txtSec.Text = ""
    End Sub
End Class