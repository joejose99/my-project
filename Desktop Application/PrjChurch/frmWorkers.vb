Imports System.Data.OleDb
Public Class frmWorkers

    Private Sub frmWorkers_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Me.Left = 0
        Me.Top = 100
        Me.MdiParent = mdiChurch
        Call Roles()
    End Sub
    Private _stid As String

    Public Property AddMebId() As String
        Get
            Return _stid
        End Get
        Set(ByVal value As String)
            _stid = value
            txtSem.Text = _stid



            Me.txtSec.Text = ""




            Try
                Dim sqlString As String = ""
                
                Call conns()

                str_sql_user_select = "SELECT * FROM  Church where vMemberId= '" & txtSem.Text & "'"

                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                Dim ro As Integer = 0
                While myAccessReader.Read()


                    txtSec.Text = myAccessReader("vSurname")
                    TextBox1.Text = myAccessReader("vFname")
                    TextBox2.Text = myAccessReader("vMobile")
                    ' Me.TextBox10.Text = myAccessReader("vMidName")



                    ro += 1

                End While



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
    Private dptcode As String

    Public Property AddDpt() As String
        Get
            Return dptcode
        End Get
        Set(ByVal value As String)
            dptcode = value
            txtCCode.Text = dptcode


            Try
                Dim sqlString As String = ""
                txtCourseName.Text = ""
                Call conns()

                str_sql_user_select = "SELECT * FROM  Department where vDepartCode= '" & txtCCode.Text & "'"

                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                Dim ro As Integer = 0
                While myAccessReader.Read()


                    txtCourseName.Text = myAccessReader("vDepartName")
                    


                    ro += 1

                End While



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

    Private Sub btngo_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btngo.Click
        Try

            Call stAdds()

            Dim NoDpt As Integer = 0

            Dim NoDpt1 As Integer = 0


            Dim NoDpt2 As Integer = 0

           

            Call conns()

            ' str_sql_user_select = "SELECT * FROM Church where vMemberId ='" & txtSem.Text & "'  "
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [DepartMember] where vDepartCode ='" & txtCCode.Text & "' "


            'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

            'myreader = comUserSelect.ExecuteReader()
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()


            While myAccessReader.Read()

                NoDpt2 = myAccessReader("RecordCount")

            End While
            'mycon.Close()
            myAccessReader.Close()
            strconss.Close()

            Call conns()

            str_sql_user_select = "SELECT * FROM Church where vMemberId ='" & txtSem.Text & "'  "
            'str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [DepartMember]  where vMemberId ='" & txtSem.Text & "'"
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

           
            Dim Ids As String = ""
            Dim dpmbid As String = ""
            

            Call conns()

            str_sql_user_select = "SELECT * FROM Department where vDepartCode ='" & txtCCode.Text & "'  "
            'str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [DepartMember]  where vMemberId ='" & txtSem.Text & "'"
            'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

            'myreader = comUserSelect.ExecuteReader()
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()


            While myAccessReader.Read()

                Ids = Trim((myAccessReader("vDepartCode")))
                dpmbid = Trim((myAccessReader("vMemberId")))

            End While
            'mycon.Close()
            myAccessReader.Close()
            strconss.Close()


           



            Dim dateapp As String
            Dim roless As String = "Head Of Department"
            Call conns()
            dateapp = CStr(DateTimePicker1.Value)
            Dim sqlString As String = ""

            If NoDpt2 = 0 Then
                'Call conns()


                sqlString = "INSERT INTO  [DepartMember]([vDepartCode],[vDepartName],[vHeadofDepartId],[vMemberId], [dDate]) VALUES(" & _
                 "'" & Me.txtCCode.Text.Trim & "'" & "," & _
                 "'" & Me.txtCourseName.Text.Trim & "'" & "," & _
                 "'" & roless & "'" & "," & _
                 "'" & Me.txtSem.Text.Trim & "'" & "," & _
                 "'" & dateapp & "'" & ")"
                'End Select
                'comUserSelect = New SqlClient.SqlCommand(sqlString, mycon)
                'comUserSelect.ExecuteNonQuery()
                comUserSelectS = New OleDbCommand(sqlString, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                'mycon.Close()
                strconss.Close()

            End If
            Call conns()

            ' str_sql_user_select = "SELECT * FROM Church where vMemberId ='" & txtSem.Text & "'  "
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [DepartMember]  where vMemberId ='" & txtSem.Text & "' and vDepartCode ='" & txtCCode.Text & "'"


            'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

            'myreader = comUserSelect.ExecuteReader()
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()


            While myAccessReader.Read()

                NoDpt1 = myAccessReader("RecordCount")

            End While
            'mycon.Close()
            myAccessReader.Close()
            strconss.Close()
            If NoDpt1 <> 0 Then

                ' MsgBox("This Data Has been Added Already", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If

           



            If txtCCode.Text = "" Then

                MsgBox("Department Code No Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            If txtCourseName.Text = "" Then

                MsgBox("Department Name No Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If

            'If txtSem.Text = "" Then

            'MsgBox("Employee Id  Can not be Empty", MsgBoxStyle.Information, "Information")
            'Exit Sub
            ' End If


            If txtSem.Text <> "" And txtSem.Text = "" Then

                MsgBox("Member Id Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If

            If txtSec.Text = "" Then

                MsgBox("Surnme  Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            If ComboBox2.Text = "" Then

                MsgBox("Role  Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            Call conns()
           
            sqlString = "INSERT INTO  [DepartMember]([vDepartCode],[vDepartName],[vHeadofDepartId],[vMemberId], [dDate]) VALUES(" & _
             "'" & Me.txtCCode.Text.Trim & "'" & "," & _
             "'" & Me.txtCourseName.Text.Trim & "'" & "," & _
             "'" & Me.ComboBox2.Text.Trim & "'" & "," & _
             "'" & Me.txtSem.Text.Trim & "'" & "," & _
             "'" & dateapp & "'" & ")"
            'End Select
            'comUserSelect = New SqlClient.SqlCommand(sqlString, mycon)
            'comUserSelect.ExecuteNonQuery()
            comUserSelectS = New OleDbCommand(sqlString, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            'mycon.Close()
            strconss.Close()
            MsgBox("Data has been Saved", MsgBoxStyle.DefaultButton1, "Information")


            Call conns()
            If Ids = txtCCode.Text And txtSem.Text <> dpmbid Then
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

            End If
            strconss.Close()

            Me.txtCCode.Text = ""

            Me.txtCourseName.Text = ""
            Me.txtSec.Text = ""
            Me.txtSem.Text = ""
            Me.ComboBox2.Text = ""
            TextBox1.Text = ""

            Call Roles()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try

    End Sub
    Private Sub Roles()
        Try
            Dim rows As Integer
            Call conns()

            ' str_sql_user_select = "SELECT * FROM Church where vMemberId ='" & txtSem.Text & "'  "
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [DepartMember]  "


            'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

            'myreader = comUserSelect.ExecuteReader()
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()


            While myAccessReader.Read()

                rows = myAccessReader("RecordCount")

            End While
            'mycon.Close()
            myAccessReader.Close()
            strconss.Close()
            If rows <> 0 Then
                Call conns()
                ComboBox2.Items.Clear()

                TextBox2.Text = ""

                ' str_sql_user_select = "SELECT DISTINCT(vSection)AS [RecordYear]  FROM student "
                str_sql_user_select = "SELECT  DISTINCT(vHeadofDepartId)AS [RecordYear]FROM DepartMember"



                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                ' myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                'Dim ro As Integer = 0
                'While myreader.Read()
                While myAccessReader.Read()

                    ComboBox2.Items.Add(myAccessReader(Trim("RecordYear") & ""))


                End While
                'myreader.Close()
                'mycon.Close()

                myAccessReader.Close()
                strconss.Close()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try

    End Sub
    Public Sub stAdds()
        Try

            Call conns()
            str_sql_user_select = "SELECT * FROM DepartMember"


        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub txtCCode_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles txtCCode.DoubleClick
        frmDptPuup.MdiParent = mdiChurch
        frmDptPuup.Show()
        frmDptPuup.BringToFront()
        frmDptPuup.WindowState = FormWindowState.Normal

    End Sub

    Private Sub txtCCode_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles txtCCode.TextChanged

    End Sub

    Private Sub txtSem_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles txtSem.DoubleClick
        frmMemberPuup.MdiParent = mdiChurch
        frmMemberPuup.Show()
        frmMemberPuup.BringToFront()
        frmMemberPuup.WindowState = FormWindowState.Normal

    End Sub

    Private Sub txtSem_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles txtSem.TextChanged

    End Sub

    Private Sub btnReset_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnReset.Click

        Me.txtCCode.Text = ""

        Me.txtCourseName.Text = ""
        Me.txtSec.Text = ""
        Me.txtSem.Text = ""
        Me.ComboBox2.Text = ""
        TextBox1.Text = ""

    End Sub

    Private Sub butExit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butExit.Click
        Me.Close()
    End Sub
End Class