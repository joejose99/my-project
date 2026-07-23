Imports System.Data.OleDb
Public Class frmAddMember

    Private Sub CheckBox2_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CheckBox2.CheckedChanged
        CheckBox1.Checked = False
        Call generateId()
    End Sub
    Private vGenerate As String
    Private Sub generateId()
        Try

            Dim rows As Integer
            Dim newdate, newdate1 As String
            Dim ad1 As Integer
            Dim dates As Date
            Dim year As String = ""
            Dim dat As Date
            Dim years As String = ""
            dat = Date.Now

            year = DatePart(DateInterval.Year, dat)

            dates = CDate(DateTimePicker2.Text)

            'year = DatePart(DateInterval.Year, dates)

            newdate = ""
            newdate1 = ""
            status = "Auto"

            Call conns()
            str_sql_user_select = "SELECT COUNT(vMemberId) AS [RecordCount] FROM  [Church] where vAuto ='" & status & "'  "
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
                newdate1 = "MB" & year & "00" & "1"
                TextBox16.Text = Trim(newdate1)
                vGenerate = "1"
            End If
            If rows <> 0 Then



                '########## VALIDATION FOR NEW YEAR BEGINS HERE

                Dim maxId As String = ""
                'Dim vGenerate As String = ""
                Call conns()
                'str_sql_user_select = "select id,vGenerate  from Church where vAuto ='" & status & "' order by id Asc "
                str_sql_user_select = "select max(id) AS  [Studentid] from Church where vAuto ='" & status & "'  "

                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                'While myreader.Read
                While myAccessReader.Read
                    maxId = Trim(myAccessReader("Studentid")) & ""
                    ' vGenerate = Trim(myAccessReader("vGenerate")) & ""
                End While

                myAccessReader.Close()
                strconss.Close()

                Call conns()
                str_sql_user_select = "select  [dDate] from Church where vAuto ='" & status & "' and id =" & maxId & "  "
                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                'While myreader.Read
                While myAccessReader.Read
                    newdate = Trim(myAccessReader("dDate")) & ""


                End While
                myAccessReader.Close()
                strconss.Close()
                Dim newDate2 As Date
                newDate2 = CDate(newdate)
                newdate = DatePart(DateInterval.Year, newDate2)

                If Trim(year) <> Trim(newdate) Then
                    newdate1 = "MB" & year & "00" & "1"
                    TextBox16.Text = Trim(newdate1)
                    vGenerate = "1"
                    Exit Sub
                End If

                '########## END OF VALIDATION FOR NEW YEAR


                Call conns()
                'str_sql_user_select = "select max(id)AS  [Studentid] from Church where vAuto ='" & status & "'  "

                str_sql_user_select = "select id,vGenerate  from Church where vAuto ='" & status & "' and id =" & maxId & " "


                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                'While myreader.Read
                While myAccessReader.Read
                    newdate = Trim(myAccessReader("vGenerate")) & ""

                End While

                ad1 = CInt(newdate)
                ad1 += 1
                newdate = CStr(ad1)
                vGenerate = newdate
                newdate1 = "MB" & year & "00" & newdate
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

    Private Sub btngo_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btngo.Click
        Try

            'Call stAdd()

            ' If ComboBox1.Text = "" Then

            'MsgBox("Department Code Can not be Empty", MsgBoxStyle.Information, "Information")
            'Exit Sub
            'End If
            If TextBox16.Text = "" Then

                MsgBox("Member Registration No Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If

            If TextBox1.Text = "" Then

                MsgBox("Surname Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            If TextBox2.Text = "" Then

                MsgBox("First Name Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If

            If RadioButton2.Checked = False And RadioButton1.Checked = False Then

                MsgBox("Please Select Gender", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            If TextBox9.Text = "" Then

                MsgBox("Address Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            If TextBox5.Text = "" Then

                TextBox5.Text = "0"
            End If


            If TextBox11.Text = "" Then

                MsgBox("Address  Description Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            If TextBox8.Text = "" Then

                MsgBox("Mobile Phone Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If

            If TextBox19.Text = "" Then

                MsgBox("Profession Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            'If TextBox6.Text = "" Then

            'MsgBox("Qualification Can not be Empty", MsgBoxStyle.Information, "Information")
            'Exit Sub
            'End If
            'If ComboBox2.Text = "" Then

            'MsgBox("Grade Can not be Empty", MsgBoxStyle.Information, "Information")
            ' Exit Sub
            ' End If
            If TextBox12.Text = "" Then

                MsgBox("Location Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            'If TextBox14.Text = "" Then

            'MsgBox("Profession Can not be Empty", MsgBoxStyle.Information, "Information")
            'Exit Sub
            'End If
            'If TextBox15.Text = "" Then

            'MsgBox("Next of Kinds Can not be Empty", MsgBoxStyle.Information, "Information")
            'Exit Sub
            'End If
            If TextBox4.Text = "" Then

                MsgBox("Bus Stop Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If


            Dim gender As String
            'Dim church As String

            gender = "Male"
            If RadioButton2.Checked = True Then
                gender = "Male"
            End If

            If RadioButton1.Checked = True Then
                gender = "Female"
            End If


            


            If ComboBox4.Text = "" Then

                MsgBox("Please Select Adult / Children Church ", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            Dim datebirth As String
            Dim dateapp As String
            Dim dateset As String

            dateset = CStr(textbox18.Value)

            datebirth = CStr(DateTimePicker2.Value)
            dateapp = CStr(DateTimePicker1.Value)
            Dim sqlString As String = ""

            Call conns()

            sqlString = "INSERT INTO  [Church]([dbirthdate],[dDate],vGenerate,vState,vAdultChild,vAuto ,vProfesion,[vMemberId], [vSurname], [vFName], [vMidName],[VAddress],[vEmail],[vMobile],[vHPhone],[vLocation],[vBus_Stop],[vAddresDec],[vNoOfDpt],[vGender]) VALUES(" & _
            "'" & dateapp & "'," & _
            "'" & datebirth & "'," & _
            "'" & vGenerate & "'," & _
            "'" & Me.TextBox20.Text.Trim & "'" & "," & _
            "'" & ComboBox4.Text & "'," & _
            "'" & status & "'," & _
          "'" & Me.TextBox19.Text.Trim & "'" & "," & _
            "'" & Me.TextBox16.Text.Trim & "'" & "," & _
             "'" & Me.TextBox1.Text.Trim & "'" & "," & _
             "'" & Me.TextBox2.Text.Trim & "'" & "," & _
             "'" & Me.TextBox10.Text.Trim & "'" & "," & _
             "'" & Me.TextBox9.Text.Trim & "'" & "," & _
             "'" & Me.TextBox3.Text.Trim & "'" & "," & _
             "'" & Me.TextBox8.Text.Trim & "'" & "," & _
             "'" & Me.TextBox7.Text.Trim & "'" & "," & _
             "'" & Me.TextBox12.Text.Trim & "'" & "," & _
             "'" & Me.TextBox4.Text.Trim & "'" & "," & _
             "'" & Me.TextBox11.Text.Trim & "'" & "," & _
             "'" & Me.TextBox5.Text.Trim & "'" & "," & _
              "'" & gender & " '" & ")"
            'End Select
            'comUserSelect = New SqlCommand(sqlString, mycon)
            'comUserSelect.ExecuteNonQuery()

            comUserSelectS = New OleDbCommand(sqlString, strconss)
            comUserSelectS.ExecuteNonQuery()
            strconss.Close()
            'mycon.Close()
            MsgBox("Data has been Saved", MsgBoxStyle.DefaultButton1, "Student Details")

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
            Me.TextBox14.Text = ""
            Me.TextBox5.Text = ""
            Me.TextBox4.Text = ""
            Me.TextBox15.Text = ""
            Me.ComboBox1.Text = ""
            Me.TextBox12.Text = ""
            Me.TextBox11.Text = ""
            Me.ComboBox2.Text = ""
            Me.ComboBox3.Text = ""
            Me.TextBox19.Text = ""
            TextBox17.Text = ""
            TextBox20.Text = ""
            ComboBox4.Text = ""
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
            str_sql_user_select = "SELECT * FROM Church"


        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private Sub frmAddMember_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Try
            Me.MdiParent = mdiChurch
            Me.Left = 0
            Me.Top = 100

            Dim rows As Integer
            'Dim newdate As String

            Call conns()
            str_sql_user_select = "SELECT COUNT(vMemberId) AS [RecordCount] FROM  [Church]  "
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


            
            If rows <> 0 Then


                Call conns()
                str_sql_user_select = "select Distinct(vBus_Stop)AS  [Studentid] from Church  "
                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                TextBox4.Items.Clear()
                'While myreader.Read
                While myAccessReader.Read
                    TextBox4.Items.Add(myAccessReader("Studentid"))

                    'newdate = Trim(myAccessReader("Studentid")) & ""
                End While
               
                myAccessReader.Close()
                strconss.Close()
                'mycon.Close()


                Call conns()
                str_sql_user_select = "select Distinct(vLocation)AS  [Studentid] from Church  "
                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                TextBox12.Items.Clear()
                'While myreader.Read
                While myAccessReader.Read
                    TextBox12.Items.Add(myAccessReader("Studentid"))

                    'newdate = Trim(myAccessReader("Studentid")) & ""
                End While

                myAccessReader.Close()
                strconss.Close()



                Call conns()
                str_sql_user_select = "select Distinct(vState)AS  [Studentid] from Church  "
                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()
                TextBox20.Items.Clear()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                'While myreader.Read
                While myAccessReader.Read
                    TextBox20.Items.Add(myAccessReader("Studentid"))

                    'newdate = Trim(myAccessReader("Studentid")) & ""
                End While

                myAccessReader.Close()
                strconss.Close()
                'mycon.Close()

            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub ComboBox1_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ComboBox1.TextChanged

    End Sub

    Private Sub btnReset_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnReset.Click
        Dim Choice As String
        Choice = MsgBox("Are you sure you want to Reset?", vbYesNo + vbInformation, "Reset")
        If Choice = vbYes Then

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
            Me.TextBox14.Text = ""
            Me.TextBox5.Text = ""
            Me.TextBox4.Text = ""
            Me.TextBox15.Text = ""
            Me.ComboBox1.Text = ""
            Me.TextBox12.Text = ""
            Me.TextBox11.Text = ""
            Me.ComboBox2.Text = ""
            Me.ComboBox3.Text = ""
            Me.ComboBox2.Text = ""
            Me.TextBox17.Text = ""
            Me.TextBox19.Text = ""
            TextBox16.Enabled = True
            ComboBox1.Enabled = True
            RadioButton1.Checked = False
            RadioButton2.Checked = False
            ComboBox4.Text = ""
            TextBox20.Text = ""
        End If
    End Sub

    Private Sub butExit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butExit.Click
        Me.Close()
    End Sub
    Private status As String
    Private Sub CheckBox1_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CheckBox1.CheckedChanged
        status = "Manual"
        TextBox16.Text = ""
        CheckBox2.Checked = False
    End Sub

    Private Sub TextBox16_MouseClick(ByVal sender As Object, ByVal e As System.Windows.Forms.MouseEventArgs) Handles TextBox16.MouseClick
        CheckBox1.Checked = False
        CheckBox2.Checked = True
        Call generateId()
    End Sub

    Private Sub TextBox16_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox16.TextChanged

    End Sub

    Private Sub RadioButton2_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles RadioButton2.CheckedChanged

    End Sub

    Private Sub RadioButton1_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles RadioButton1.CheckedChanged

    End Sub

End Class