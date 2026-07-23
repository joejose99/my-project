Imports System.Data.OleDb
Public Class frmEmployee

    Private Sub ComboBox13_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox6.SelectedIndexChanged

    End Sub
    Public Sub stAddEmp()
        Try
            Call conns()
            str_sql_user_select = "SELECT * FROM Employee"

        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private Sub btngo_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btngo.Click
        Try

            Call stAddEmp()




            If ComboBox1.Text = "" Then

                MsgBox("Department Code Can not be Empty", MsgBoxStyle.Information, "SurName")
                Exit Sub
            End If
            If TextBox16.Text = "" Then

                MsgBox("Student Registration No Can not be Empty", MsgBoxStyle.Information, "SurName")
                Exit Sub
            End If

            If TextBox1.Text = "" Then

                MsgBox("Surname Can not be Empty", MsgBoxStyle.Information, "SurName")
                Exit Sub
            End If
            If TextBox2.Text = "" Then

                MsgBox("First Name Can not be Empty", MsgBoxStyle.Information, "SurName")
                Exit Sub
            End If

            If RadioButton2.Checked = False And RadioButton1.Checked = False Then

                MsgBox("Please Select Gender", MsgBoxStyle.Information, "SurName")
                Exit Sub
            End If
            If TextBox9.Text = "" Then

                MsgBox("Address Can not be Empty", MsgBoxStyle.Information, "SurName")
                Exit Sub
            End If

            If TextBox8.Text = "" Then

                MsgBox("Mobile Phone Can not be Empty", MsgBoxStyle.Information, "SurName")
                Exit Sub
            End If

            If TextBox6.Text = "" Then

                MsgBox("Qualification Can not be Empty", MsgBoxStyle.Information, "SurName")
                Exit Sub
            End If
            If TextBox17.Text = "" Then

                MsgBox("Grade Can not be Empty", MsgBoxStyle.Information, "SurName")
                Exit Sub
            End If
            If TextBox5.Text = "" Then

                MsgBox("Last School Attended Can not be Empty", MsgBoxStyle.Information, "SurName")
                Exit Sub
            End If

            If TextBox15.Text = "" Then

                MsgBox("Next of Kinds Can not be Empty", MsgBoxStyle.Information, "SurName")
                Exit Sub
            End If
            If TextBox13.Text = "" Then

                MsgBox("How did you Know us Can not be Empty", MsgBoxStyle.Information, "SurName")
                Exit Sub
            End If

            If txtposCode.Text = "" Then

                MsgBox("Position Code Can not be Empty", MsgBoxStyle.Information, "SurName")
                Exit Sub
            End If
            Dim gender As String


            gender = "Male"
            If RadioButton2.Checked = True Then
                gender = "Male"
            End If

            If RadioButton1.Checked = True Then
                gender = "Female"
            End If
            Dim datebirth As String
            Dim dateapp As String
            'status = "Auto"

            datebirth = CStr(DateTimePicker2.Value)
            dateapp = CStr(DateTimePicker1.Value)
            Dim sqlString As String = ""
            sqlString = "INSERT INTO  [Employee]([dEmpBdate],[dEmpdate],vAuto,[vEmpid], [vSurname], [vFName], [vMidName],[VAddress],[vEmail],[vMobile],[vHPhone],[vQualif],[vGrade],[vHow_Know],[vLSch_Attended],[vDepartStaffCode],[vNear_to_kin],[vPosCode],[vnextofkindsMobile],[vNear_to_kinAdd],[vSalGrade],[vGender]) VALUES(" & _
            "'" & dateapp & "'," & _
            "'" & datebirth & "'," & _
              "'" & status & "'," & _
             "'" & Me.TextBox16.Text.Trim & "'" & "," & _
             "'" & Me.TextBox1.Text.Trim & "'" & "," & _
             "'" & Me.TextBox2.Text.Trim & "'" & "," & _
             "'" & Me.TextBox10.Text.Trim & "'" & "," & _
             "'" & Me.TextBox9.Text.Trim & "'" & "," & _
             "'" & Me.TextBox3.Text.Trim & "'" & "," & _
             "'" & Me.TextBox8.Text.Trim & "'" & "," & _
             "'" & Me.TextBox7.Text.Trim & "'" & "," & _
             "'" & Me.TextBox6.Text.Trim & "'" & "," & _
             "'" & Me.TextBox17.Text.Trim & "'" & "," & _
             "'" & Me.TextBox13.Text.Trim & "'" & "," & _
             "'" & Me.TextBox5.Text.Trim & "'" & "," & _
             "'" & Me.ComboBox1.Text.Trim & "'" & "," & _
              "'" & Me.TextBox15.Text.Trim & "'" & "," & _
             "'" & Me.txtposCode.Text.Trim & "'" & "," & _
             "'" & Me.TextBox11.Text.Trim & "'" & "," & _
             "'" & Me.TextBox4.Text.Trim & "'" & "," & _
             "'" & Me.TextBox18.Text.Trim & "'" & "," & _
              "'" & gender & " '" & ")"

            comUserSelectS = New OleDbCommand(sqlString, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            strconss.Close()
            MsgBox("Data has been Saved", MsgBoxStyle.DefaultButton1, "Information")

            Me.TextBox16.Text = ""
            Me.TextBox1.Text = ""
            Me.TextBox2.Text = ""
            Me.TextBox10.Text = ""
            Me.TextBox9.Text = ""
            Me.TextBox3.Text = ""
            Me.TextBox8.Text = ""
            Me.TextBox7.Text = ""
            Me.TextBox6.Text = ""
            Me.TextBox13.Text = ""
            Me.TextBox5.Text = ""
            Me.TextBox4.Text = ""
            Me.TextBox15.Text = ""
            Me.ComboBox1.Text = ""
            ' Me.TextBox12.Text = ""
            Me.TextBox18.Text = ""
            Me.txtposCode.Text = ""
            Me.TextBox11.Text = ""
            Me.TextBox17.Text = ""
            'ComboBox2.Text = ""
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try

    End Sub
    Private _departid As String
    Private _empreg As String
    Private _CourseCode As String
    Private _Salgrade As String
    Private status As String
    Private Sub generateId()
        Try

            Dim rows As Integer
            Dim newdate, newdate1 As String
            Dim ad1 As Integer
            Dim dates As Date
            Dim year As String
            dates = CDate(DateTimePicker1.Text)

            year = DatePart(DateInterval.Year, dates)

            newdate = ""
            newdate1 = ""
            status = "Auto"

            Call conns()
            str_sql_user_select = "SELECT COUNT(vEmpid) AS [RecordCount] FROM  [Employee] where vAuto ='" & status & "'  "
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            'While myreader.Read
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")

            End While
            'myreader.Close()
            myAccessReader.Close()
            strconss.Close()
            'mycon.Close()


            If rows = 0 Then
                newdate1 = "EMP" & year & "00" & "1"
                TextBox16.Text = Trim(newdate1)
            End If
            If rows <> 0 Then



                '########## VALIDATION FOR NEW YEAR BEGINS HERE

                Dim maxId As String = ""
                Call conns()
                str_sql_user_select = "select max(id)AS  [Studentid] from Employee where vAuto ='" & status & "'  "
                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                'While myreader.Read
                While myAccessReader.Read
                    maxId = Trim(myAccessReader("Studentid")) & ""
                End While

                myAccessReader.Close()
                strconss.Close()

                Call conns()
                str_sql_user_select = "select  [dEmpdate] from Employee where vAuto ='" & status & "' and id =" & maxId & "  "
                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                'While myreader.Read
                While myAccessReader.Read
                    newdate = Trim(myAccessReader("dEmpdate")) & ""


                End While
                myAccessReader.Close()
                strconss.Close()
                Dim newDate2 As Date
                newDate2 = CDate(newdate)
                newdate = DatePart(DateInterval.Year, newDate2)

                If Trim(year) <> Trim(newdate) Then
                    newdate1 = "EMP" & year & "00" & "1"
                    TextBox16.Text = Trim(newdate1)
                    Exit Sub
                End If

                '########## END OF VALIDATION FOR NEW YEAR


                Call conns()
                str_sql_user_select = "select max(id)AS  [Studentid] from Employee where vAuto ='" & status & "'  "
                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                'While myreader.Read
                While myAccessReader.Read
                    newdate = Trim(myAccessReader("Studentid")) & ""
                End While
                ad1 = CInt(newdate)
                ad1 += 1
                newdate = CStr(ad1)
                newdate1 = "EMP" & year & "00" & newdate
                myAccessReader.Close()
                strconss.Close()
                'mycon.Close()
                TextBox16.Text = Trim(newdate1)
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub




    Public Property DepartId() As String
        Get
            Return _departid

        End Get
        Set(ByVal value As String)
            _departid = value
            ComboBox1.Text = _departid
            'TextBox16.Text = Trim(reg)
            RadioButton3.Checked = False

        End Set

    End Property
    Public Property empreg() As String

        Get
            Return _empreg

        End Get
        Set(ByVal value As String)
            _empreg = value
            'ComboBox1.Text = _bookNameValue
            TextBox16.Text = _empreg
            RadioButton3.Checked = False
            regs = 0
            reg = ""
            reg1 = ""

        End Set
    End Property
    Private Sub RadioButton4_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles RadioButton4.CheckedChanged
        frmEmpSearch.Close()
        ComboBox1.Text = ""
        TextBox16.Text = ""
        RadioButton3.Checked = False
    End Sub

    Public Property SalGrade() As String
        Get
            Return _Salgrade
        End Get
        Set(ByVal value As String)
            _Salgrade = value
            txtposCode.Text = _Salgrade

            Try
                Call conns()
                str_sql_user_select = "SELECT vPosCode,vPosition,vSalGrade FROM Positions where vposCode= '" & txtposCode.Text & "'"

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                Dim ro As Integer = 0
                While myAccessReader.Read()

                    TextBox18.Text = myAccessReader("vSalGrade")


                    ro += 1

                End While

                strconss.Close()
                myAccessReader.Close()
                Exit Property
            Catch Exp As OleDb.OleDbException
                MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
            Catch Exp As Exception
                MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
            End Try

        End Set

    End Property

    Private Sub Label24_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Label24.Click

    End Sub
    Private Sub ComboBox3_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs)

    End Sub



    


    
    Private Sub frmEmployee_Activated(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Activated
        Me.Left = 0
        Me.Top = 100
        Me.Width = 702
        Me.Height = 530
        Me.MdiParent = mdiChurch
    End Sub

    Private Sub frmEmployee_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Click
        Me.BringToFront()
    End Sub

    Private Sub frmEmployee_FormClosing(ByVal sender As Object, ByVal e As System.Windows.Forms.FormClosingEventArgs) Handles Me.FormClosing

    End Sub

    Private Sub frmEmployee_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Me.Left = 0
        Me.Top = 100
        Me.Width = 702
        Me.Height = 530
        Me.MdiParent = mdiChurch

        Me.TextBox16.Text = ""
        Me.TextBox1.Text = ""
        Me.TextBox2.Text = ""
        Me.TextBox10.Text = ""
        Me.TextBox9.Text = ""
        Me.TextBox3.Text = ""
        Me.TextBox8.Text = ""
        Me.TextBox7.Text = ""
        Me.TextBox6.Text = ""
        Me.TextBox13.Text = ""
        'Me.TextBox14.Text = ""
        Me.TextBox5.Text = ""
        Me.TextBox4.Text = ""
        Me.TextBox15.Text = ""
        Me.ComboBox1.Text = ""
        'Me.TextBox12.Text = ""
        Me.TextBox18.Text = ""
        Me.txtposCode.Text = ""
    End Sub

    Private Sub butExit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butExit.Click
        Me.Close()
    End Sub

    Private Sub TextBox10_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox10.TextChanged

    End Sub

    Private Sub RadioButton3_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles RadioButton3.Click
        frmEmpSearch.MdiParent = mdiChurch
        frmEmpSearch.Show()
        frmEmpSearch.BringToFront()
        ComboBox1.Text = _departid
        'TextBox16.Text = Trim(reg)


        RadioButton3.Checked = False
        frmEmpSearch.WindowState = FormWindowState.Normal
        Call generateId()
        'TextBox16.Text = _empreg
        'ComboBox1.Text = ""

    End Sub

    Private Sub txtposCode_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles txtposCode.DoubleClick
        frmSalpuup.MdiParent = mdiChurch
        frmSalpuup.Show()
    End Sub

    Private Sub txtposCode_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles txtposCode.TextChanged

    End Sub

    Private Sub TextBox18_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles TextBox18.DoubleClick
        frmSalpuup.MdiParent = mdiChurch
        frmSalpuup.Show()

        frmSalpuup.BringToFront()
        frmSalpuup.WindowState = FormWindowState.Normal

    End Sub

    Private Sub TextBox18_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox18.TextChanged

    End Sub

    Private Sub ComboBox1_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ComboBox1.TextChanged

    End Sub

    Private Sub btnReset_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnReset.Click
        Me.TextBox16.Text = ""
        Me.TextBox1.Text = ""
        Me.TextBox2.Text = ""
        Me.TextBox10.Text = ""
        Me.TextBox9.Text = ""
        Me.TextBox3.Text = ""
        Me.TextBox8.Text = ""
        Me.TextBox7.Text = ""
        Me.TextBox6.Text = ""
        Me.TextBox13.Text = ""
        'Me.TextBox14.Text = ""
        Me.TextBox5.Text = ""
        Me.TextBox4.Text = ""
        Me.TextBox15.Text = ""
        Me.ComboBox1.Text = ""
        'Me.TextBox12.Text = ""
        Me.TextBox18.Text = ""
        Me.txtposCode.Text = ""
    End Sub
End Class