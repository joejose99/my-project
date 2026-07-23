Imports System.Data.OleDb
Public Class frmAddDepart
    Private Sub btngo_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btngo.Click
        Try

            Call stAdd()

            Dim NoDpt As Integer = 0




            Call conns()

            str_sql_user_select = "SELECT * FROM Church where vMemberId ='" & txtSem.Text & "'  "


            'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

            'myreader = comUserSelect.ExecuteReader()
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()


            While myAccessReader.Read()
               
                NoDpt = CInt(myAccessReader("vNoOfDpt"))

            End While
            'mycon.Close()
            myAccessReader.Close()
            strconss.Close()


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

            Call conns()
            If txtCCode.Text = "" Then

                MsgBox("Department Code No Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If


            'If txtSem.Text = "" Then

            'MsgBox("Employee Id  Can not be Empty", MsgBoxStyle.Information, "Information")
            'Exit Sub
            ' End If


            If txtSec.Text <> "" And txtSem.Text = "" Then

                MsgBox("Member Id Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If

            If txtCourseName.Text = "" Then

                MsgBox("Department Name Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If


            Dim dateapp As String


            dateapp = CStr(DateTimePicker1.Value)
            Dim sqlString As String = ""
            sqlString = "INSERT INTO  [Department]([vDepartCode],[vDepartName],[vHeadofDepartName],[vMemberId], [dDate]) VALUES(" & _
             "'" & Me.txtCCode.Text.Trim & "'" & "," & _
             "'" & Me.txtCourseName.Text.Trim & "'" & "," & _
             "'" & Me.txtSec.Text.Trim & "'" & "," & _
             "'" & Me.txtSem.Text.Trim & "'" & "," & _
             "'" & dateapp & "'" & ")"
            'End Select
            'comUserSelect = New SqlClient.SqlCommand(sqlString, mycon)
            'comUserSelect.ExecuteNonQuery()
            comUserSelectS = New OleDbCommand(sqlString, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            'mycon.Close()
            strconss.Close()
            MsgBox("Data has been Saved", MsgBoxStyle.Information, "Information")


            Call conns()

            'Dim sqlString As String
            'Dim NoDpt As Integer = 0
            NoDpt += 1
            sqlString = "UPDATE  [Church] SET " & _
                    "vNoOfDpt='" & NoDpt & "'" & _
                    "where vMemberId ='" & txtSem.Text.Trim & "' "

            'comUserSelect = New SqlCommand(sqlString, mycon)
            'comUserSelect.ExecuteNonQuery()

            comUserSelectS = New OleDbCommand(sqlString, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()
            strconss.Close()

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
    Private _stid As String

    Public Property Stid() As String
        Get
            Return _stid
        End Get
        Set(ByVal value As String)
            _stid = value
            txtSem.Text = _stid

           

            Me.txtSec.Text = ""
            
            

          
            Try
                Dim sqlString As String = ""
                Dim surname As String = ""
                Dim fname As String = ""
                Call conns()

                str_sql_user_select = "SELECT * FROM  Church where vMemberId= '" & txtSem.Text & "'"

                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                Dim ro As Integer = 0
                While myAccessReader.Read()


                    surname = myAccessReader("vSurname")
                    fname = myAccessReader("vFname")
                    ' Me.TextBox10.Text = myAccessReader("vMidName")



                    ro += 1

                End While
               
                txtSec.Text = surname & "  " & fname

                myAccessReader.Close()
                strconss.Close()
                Exit Property
            Catch Exp As OleDb.OleDbException
                MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
            Catch Exp As Exception
                MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
            End Try
        End Set

    End Property

    Public Sub stAdd()
        Try

            Call conns()
            str_sql_user_select = "SELECT * FROM Department"


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

    Private Sub frmAddDepart_Activated(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Activated
        Me.Left = 0
        Me.Top = 100
        Me.Width = 611
        Me.Height = 222
        Me.MdiParent = mdiChurch
    End Sub

    Private Sub frmEmpDepart_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Click
        Me.BringToFront()
    End Sub

    Private Sub frmAddDepart_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
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

    Private Sub txtSec_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles txtSec.DoubleClick
        frmMemberPuup.MdiParent = mdiChurch
        frmMemberPuup.Show()
        frmMemberPuup.BringToFront()
        frmMemberPuup.WindowState = FormWindowState.Normal

    End Sub

    Private Sub txtSec_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles txtSec.TextChanged

    End Sub
End Class