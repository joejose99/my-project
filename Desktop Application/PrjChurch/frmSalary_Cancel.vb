Imports System.Data.OleDb
Public Class frmSalary_Cancel



    Private _empsal As String
    Private codes As String
    Private general As String
    Public Property EmpEdits() As String
        Get
            Return _empsal

        End Get
        Set(ByVal value As String)
            _empsal = value


            TextBox16.Text = _empsal
            general = _empsal

            CheckBox1.Enabled = True
            ComboBox4.Enabled = True
            ComboBox5.Enabled = True
            Try
                Call conns()

                ComboBox4.Items.Clear()
                str_sql_user_select = "SELECT Distinct(vYear) AS [RecordYear] FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                Dim ro As Integer = 0
                While myAccessReader.Read()

                    ComboBox4.Items.Add(myAccessReader(Trim("RecordYear") & ""))

                    ro += 1

                End While
                strconss.Close()
                myAccessReader.Close()

                'requery()
            Catch Exp As OleDb.OleDbException
                MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
            Catch Exp As Exception
                MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
            End Try
        End Set

    End Property
    Private Sub requery()
        Try

            Dim gender As String
            Dim genderM As String
            Dim genderF As String
            gender = ""
            genderM = "Male"
            genderF = "Female"


            Dim rows As Integer

            dtgvResult.Rows.Clear()
            Call conns()
            'str_sql_user_select = "SELECT *  FROM salary  "
            str_sql_user_select = "SELECT  dSalDate ,vFname, vSurname,vMidName,vGender  FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "' and vYear='" & ComboBox4.Text & "' and vMonth='" & ComboBox5.Text & "'"

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()


            Dim ro As Integer = 0
            While myAccessReader.Read()

                Me.TextBox1.Text = myAccessReader("vSurname")
                Me.TextBox2.Text = myAccessReader("vFname")
                Me.TextBox3.Text = myAccessReader("vMidName")
                gender = myAccessReader("vGender")
                ro += 1

                'End If
            End While
            If Trim(gender) & "" = Trim(genderM) & "" Then
                RadioButton1.Checked = True
            End If

            If Trim(gender) & "" = Trim(genderF) & "" Then
                RadioButton2.Checked = True
            End If

            strconss.Close()







            Call conns()
            ro = 0
            'str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [salary]"
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'and vYear='" & ComboBox4.Text & "' and vMonth='" & ComboBox5.Text & "'"

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            'Dim rows As Integer
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()

            dtgvResult.Rows.Clear()
            Call conns()
            str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "' and vYear='" & ComboBox4.Text & "' and vMonth='" & ComboBox5.Text & "'"


            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()
            If rows = 0 Then
                MsgBox("Month Not Existing", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            ' dt.Columns.Add("description", GetType(String))
            dtgvResult.Rows.Add(rows)

            'If dr.Read.Equals(True) Then
            ' Dim ro As Integer = 0
            While myAccessReader.Read()

                'reading from the datareader
                dtgvResult.Rows(ro).Cells(0).Value = myAccessReader("id")
                dtgvResult.Rows(ro).Cells(1).Value = myAccessReader("vPosition")
                dtgvResult.Rows(ro).Cells(2).Value = myAccessReader("vDepartStaffCode")
                dtgvResult.Rows(ro).Cells(3).Value = Format(Val(myAccessReader("mSalary")))
                dtgvResult.Rows(ro).Cells(4).Value = myAccessReader("vpayStatus")
                dtgvResult.Rows(ro).Cells(5).Value = myAccessReader("vmodofpay")
                dtgvResult.Rows(ro).Cells(6).Value = myAccessReader("dSalDate")
                dtgvResult.Rows(ro).Cells(7).Value = myAccessReader("vStatus")



                'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                ro += 1

                'End If
            End While


            strconss.Close()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub frmSalaryEdit_Activated(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Activated
        Me.Left = 0
        Me.Top = 100
        Me.Width = 796
        Me.Height = 530
        Me.MdiParent = mdiChurch
    End Sub

    Private Sub frmSalaryEdit_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Click
        Me.BringToFront()
    End Sub

    Private Sub ComboBox4_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ComboBox4.SelectedIndexChanged
        Try
            Call conns()
            ComboBox5.Enabled = True
            ComboBox5.Items.Clear()
            ComboBox5.Text = ""
            str_sql_user_select = "SELECT distinct(vMonth) AS [RecordYear] FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()
            Dim ro As Integer = 0
            While myAccessReader.Read()

                ComboBox5.Items.Add(myAccessReader(Trim("RecordYear") & ""))

                ro += 1

            End While
            CheckBox1.Checked = False
            Me.dtgvResult.Rows.Clear()
            strconss.Close()
            myAccessReader.Close()



            Call conns()
            ro = 0
            Dim rows As Integer
            'str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [salary]"
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'and vYear='" & ComboBox4.Text & "' "

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            'Dim rows As Integer
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()
            If rows = 0 Then
                MsgBox("Month Not Existing", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            dtgvResult.Rows.Clear()
            Call conns()
            str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "' and vYear='" & ComboBox4.Text & "' "


            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()
           
            ' dt.Columns.Add("description", GetType(String))
            dtgvResult.Rows.Add(rows)

            'If dr.Read.Equals(True) Then
            ' Dim ro As Integer = 0
            While myAccessReader.Read()

                'reading from the datareader
                dtgvResult.Rows(ro).Cells(0).Value = myAccessReader("id")
                dtgvResult.Rows(ro).Cells(1).Value = myAccessReader("vPosition")
                dtgvResult.Rows(ro).Cells(2).Value = myAccessReader("vDepartStaffCode")
                dtgvResult.Rows(ro).Cells(3).Value = Format(Val(myAccessReader("mSalary")))
                dtgvResult.Rows(ro).Cells(4).Value = myAccessReader("vpayStatus")
                dtgvResult.Rows(ro).Cells(5).Value = myAccessReader("vmodofpay")
                dtgvResult.Rows(ro).Cells(6).Value = myAccessReader("dSalDate")
                dtgvResult.Rows(ro).Cells(7).Value = myAccessReader("vStatus")



                'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                ro += 1

                'End If
            End While


            strconss.Close()

        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub ComboBox5_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ComboBox5.SelectedIndexChanged
        If ComboBox4.Text <> "" Then
            requery()
            'MsgBox("Year Can not be Empty", MsgBoxStyle.Information, "Year")
            Exit Sub
        End If
    End Sub
    Private Sub checkme()
        Try

            ComboBox5.Text = ""
            'ComboBox4.Text = ""
            If TextBox16.Text <> "" Then
                'Call txtboxEnable()
                Me.dtgvResult.Rows.Clear()

                Dim gender As String
                Dim genderM As String
                Dim genderF As String
                gender = ""
                genderM = "Male"
                genderF = "Female"
                Me.TextBox1.Text = ""
                Me.TextBox2.Text = ""
                Me.TextBox3.Text = ""
                gender = ""

                Call conns()


                dtgvResult.Rows.Clear()
                Call conns()
                str_sql_user_select = "SELECT *  FROM salary  where vEmpid = '" & general & "'"
                'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "' and datepart(yy,dSalDate)='" & ComboBox5.Text & "' and dateName(mm,dDate)='"& ComboBox4.Text&"'  "

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ' dt.Columns.Add("description", GetType(String))
                'dtgvResult.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                Dim ro As Integer = 0
                While myAccessReader.Read()

                    Me.TextBox1.Text = myAccessReader("vSurname")
                    Me.TextBox2.Text = myAccessReader("vFname")
                    Me.TextBox3.Text = myAccessReader("vMidName")
                    gender = myAccessReader("vGender")
                    ro += 1

                    'End If
                End While
                If Trim(gender) & "" = Trim(genderM) & "" Then
                    RadioButton1.Checked = True
                End If

                If Trim(gender) & "" = Trim(genderF) & "" Then
                    RadioButton2.Checked = True
                End If
                If Trim(gender) & "" = "" Then
                    RadioButton2.Checked = False
                    RadioButton1.Checked = False
                End If

                strconss.Close()







                Call conns()

                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [salary] where vEmpid = '" & general & "'"
                'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
                Dim rows As Integer
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                While myAccessReader.Read
                    rows = myAccessReader("RecordCount")
                End While
                myAccessReader.Close()
                strconss.Close()

                dtgvResult.Rows.Clear()
                Call conns()
                ro = 0
                str_sql_user_select = "SELECT * FROM Salary where vEmpid = '" & general & "'"

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ' dt.Columns.Add("description", GetType(String))
                If rows = 0 Then
                    MsgBox("Data not Existing ", MsgBoxStyle.Information, "Information")
                    Exit Sub
                End If
                dtgvResult.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                ' Dim ro As Integer = 0
                While myAccessReader.Read()

                    'reading from the datareader
                    dtgvResult.Rows(ro).Cells(0).Value = myAccessReader("id")
                    dtgvResult.Rows(ro).Cells(1).Value = myAccessReader("vPosition")
                    dtgvResult.Rows(ro).Cells(2).Value = myAccessReader("vDepartStaffCode")
                    dtgvResult.Rows(ro).Cells(3).Value = Format(Val(myAccessReader("mSalary")))
                    dtgvResult.Rows(ro).Cells(4).Value = myAccessReader("vpayStatus")
                    dtgvResult.Rows(ro).Cells(5).Value = myAccessReader("vmodofpay")
                    dtgvResult.Rows(ro).Cells(6).Value = myAccessReader("dSalDate")
                    dtgvResult.Rows(ro).Cells(7).Value = myAccessReader("vStatus")



                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    ro += 1

                    'End If
                End While
                strconss.Close()
            End If

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private Sub CheckBox1_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CheckBox1.CheckedChanged
        Call checkme()
    End Sub
    Private Sub txtboxEnable()
        TextBox16.Enabled = False
        ComboBox4.Enabled = False
        ComboBox5.Enabled = False
    End Sub

    Private Sub txtboxdisEnable()
        TextBox16.Enabled = True
        ComboBox4.Enabled = True
        ComboBox5.Enabled = True
    End Sub


    Private Sub dtgvResult_CellClick(ByVal sender As Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtgvResult.CellClick
        Try
            codes = ""
            codes = dtgvResult.CurrentRow.Cells(0).Value()

            If codes <> "" Then
                Dim gender As String
                Dim genderM As String
                Dim genderF As String
                gender = ""
                genderM = "Male"
                genderF = "Female"




                'dtgvResult.Rows.Clear()
                Call conns()
                'str_sql_user_select = "SELECT *  FROM salary  "
                str_sql_user_select = "SELECT  dSalDate ,vFname, vSurname,vMidName,vGender  FROM Salary where id= " & Trim(codes) & "" & " "

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                Dim ro As Integer = 0
                While myAccessReader.Read()

                    Me.TextBox1.Text = myAccessReader("vSurname")
                    Me.TextBox2.Text = myAccessReader("vFname")
                    Me.TextBox3.Text = myAccessReader("vMidName")
                    gender = myAccessReader("vGender")
                    ro += 1

                    'End If
                End While
                If Trim(gender) & "" = Trim(genderM) & "" Then
                    RadioButton1.Checked = True
                End If

                If Trim(gender) & "" = Trim(genderF) & "" Then
                    RadioButton2.Checked = True
                End If

                strconss.Close()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private amt As Double
    Private Sub dtgvResult_CellContentClick(ByVal sender As System.Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtgvResult.CellContentClick
        codes = ""
        codes = dtgvResult.CurrentRow.Cells(0).Value()
        amt = CDbl(dtgvResult.CurrentRow.Cells(3).Value())
    End Sub

    Private Sub TextBox16_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles TextBox16.DoubleClick
        frmEmpsalpuup.MdiParent = mdiChurch
        frmEmpsalpuup.Show()
        frmEmpsalpuup.BringToFront()
        frmEmpsalpuup.WindowState = FormWindowState.Normal

        CheckBox1.Checked = False
        Me.dtgvResult.Rows.Clear()
        'TextBox16.Enabled = False
    End Sub



    Private Sub butEdit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butEdit.Click
        Try
            Dim code As String

            Dim ro As Integer
            Dim sqlString As String = ""
            Dim rows As Integer

            If TextBox16.Text <> "" And codes <> "" And ComboBox4.Text <> "" Then
                Call conns()



                ' Me.dtCourse.Rows.Clear()
                'reading from the datareader
                Dim gender As String
                gender = "Male"
                If RadioButton1.Checked = True Then
                    gender = "Male"
                End If

                If RadioButton2.Checked = True Then
                    gender = "Female"
                End If
                Call conns()
                str_sql_user_select = "UPDATE  [Salary] SET " & _
                                 "[vSurname] = '" & Me.TextBox1.Text & "'," & _
                                 "[vFname] = '" & Me.TextBox2.Text & "'," & _
                                  "[vMidName] = '" & Me.TextBox3.Text & "'," & _
                                  "[vgender] = '" & gender & "'" & _
                                  "where id =" & codes & "  And vEmpid ='" & TextBox16.Text & "'"

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                strconss.Close()

                Call conns()
                ro = 0
                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Salary] where id='" & codes & "' and vEmpid='" & TextBox16.Text & "'"
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                rows = 0
                While myAccessReader.Read
                    rows = myAccessReader("RecordCount")
                End While
                myAccessReader.Close()
                code = dtgvResult.Rows(ro).Cells(0).Value
                While rows > ro
                    For i As Integer = 0 To dtgvResult.RowCount - 1

                        If code = codes Then


                            sqlString = "UPDATE  [Salary] SET " & _
                            "[vPosition] = '" & dtgvResult.Rows(ro).Cells(1).Value & "' ," & _
                            "[vDepartStaffCode] = '" & dtgvResult.Rows(ro).Cells(2).Value & " '," & _
                            "[mSalary] = " & dtgvResult.Rows(ro).Cells(3).Value & " ," & _
                            "[vpayStatus] = '" & dtgvResult.Rows(ro).Cells(4).Value & " '," & _
                            "[vmodofpay] = '" & dtgvResult.Rows(ro).Cells(5).Value & "' ," & _
                            "[dSalDate] = '" & dtgvResult.Rows(ro).Cells(6).Value & " '," & _
                            "[vStatus] = '" & dtgvResult.Rows(ro).Cells(7).Value & "'" & _
                             "where id =" & codes & "  And vEmpid ='" & TextBox16.Text & "'"


                            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                            myAccessReader = comUserSelectS.ExecuteReader()



                        End If

                    Next i

                    ro += 1
                    code = dtgvResult.Rows(ro).Cells(0).Value

                End While
                MsgBox("Data has been Edited", MsgBoxStyle.Information, "Edit")


                Exit Sub
                strconss.Close()



            End If


            If TextBox16.Text <> "" And codes <> "" And ComboBox4.Text = "" And ComboBox5.Text = "" Then

                Call conns()

                Dim gender As String
                gender = "Male"
                If RadioButton1.Checked = True Then
                    gender = "Male"
                End If

                If RadioButton2.Checked = True Then
                    gender = "Female"
                End If
                Call conns()
                ro = 0
                str_sql_user_select = "UPDATE  [Salary] SET " & _
                                 "[vSurname] = '" & Me.TextBox1.Text & "'," & _
                                 "[vFname] = '" & Me.TextBox2.Text & "'," & _
                                  "[vMidName] = '" & Me.TextBox3.Text & "'," & _
                                  "[vgender] = '" & gender & "'" & _
                                  "where id =" & codes & "  And vEmpid ='" & TextBox16.Text & "'"

                Call conns()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                strconss.Close()

                Call conns()
                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Salary] where vEmpid='" & TextBox16.Text & "'"
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                rows = 0
                While myAccessReader.Read
                    rows = myAccessReader("RecordCount")
                End While
                myAccessReader.Close()
                code = dtgvResult.Rows(ro).Cells(0).Value
                While rows > ro
                    For i As Integer = 0 To dtgvResult.RowCount - 1

                        If code = codes Then


                            sqlString = "UPDATE  [Salary] SET " & _
                            "[vPosition] = '" & dtgvResult.Rows(ro).Cells(1).Value & "' ," & _
                            "[vDepartStaffCode] = '" & dtgvResult.Rows(ro).Cells(2).Value & " '," & _
                            "[mSalary] = " & dtgvResult.Rows(ro).Cells(3).Value & " ," & _
                            "[vpayStatus] = '" & dtgvResult.Rows(ro).Cells(4).Value & " '," & _
                            "[vmodofpay] = '" & dtgvResult.Rows(ro).Cells(5).Value & "' ," & _
                            "[dSalDate] = '" & dtgvResult.Rows(ro).Cells(6).Value & " '," & _
                            "[vStatus] = '" & dtgvResult.Rows(ro).Cells(7).Value & "'" & _
                             "where id =" & codes & "  And vEmpid ='" & TextBox16.Text & "'"




                            comUserSelectS = New OleDbCommand(sqlString, strconss)
                            myAccessReader = comUserSelectS.ExecuteReader()
                        End If

                    Next i

                    ro += 1
                    code = dtgvResult.Rows(ro).Cells(0).Value

                End While
                MsgBox("Data has been Edited", MsgBoxStyle.Information, "Edit")


                Exit Sub
                mycon.Close()
            End If


            mycon.Close()
            Call requery()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try

    End Sub

    Private Sub butExit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butExit.Click
        Me.Close()
    End Sub

    Private Sub TextBox16_SizeChanged(ByVal sender As Object, ByVal e As System.EventArgs) Handles TextBox16.SizeChanged

    End Sub

    Private Sub TextBox16_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox16.TextChanged

    End Sub

    Private Sub dtgvResult_CellDoubleClick(ByVal sender As Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtgvResult.CellDoubleClick
        amt = CDbl(dtgvResult.CurrentRow.Cells(3).Value())
        codes = dtgvResult.CurrentRow.Cells(0).Value()
    End Sub

    Private Sub dtgvResult_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles dtgvResult.DoubleClick
        butEdit.Visible = True
        butDelete.Visible = True
        TextBox16.Enabled = False
    End Sub

    Private Sub TextBox1_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles TextBox1.DoubleClick
        butEdit.Visible = True
        butDelete.Visible = True
        TextBox16.Enabled = False
    End Sub

    Private Sub TextBox1_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox1.TextChanged

    End Sub

    Private Sub TextBox2_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles TextBox2.DoubleClick
        butEdit.Visible = True
        butDelete.Visible = True
        TextBox16.Enabled = False
    End Sub

    Private Sub TextBox2_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox2.TextChanged

    End Sub

    Private Sub TextBox3_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles TextBox3.DoubleClick
        butEdit.Visible = True
        butDelete.Visible = True
        TextBox16.Enabled = False
    End Sub

    Private Sub TextBox3_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox3.TextChanged

    End Sub

    Private Sub butDelete_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butDelete.Click
        Try
            Dim Choices As String

            If TextBox16.Text <> "" And CheckBox1.Checked = False And TextBox16.Enabled = False And codes <> "" Then

                Choices = MsgBox("Are you sure you want to Cancel Salary Payment?", vbYesNo + vbInformation, "Salary")

                If Choices = vbYes Then
                    Call conns()
                    str_sql_user_select = "Delete from Salary where vEmpid ='" & TextBox16.Text & "' and iD =" & codes & ""


                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()
                    MsgBox("Data has been Deleted", MsgBoxStyle.DefaultButton1, "Delete")

                    myAccessReader.Close()
                    strconss.Close()


                    Call conns()
                    Dim sqlStrings As String
                    sqlStrings = "UPDATE  [Acct] SET " & _
                      "[mSalary] = [mSalary] - " & amt & ""

                    comUserSelectS = New OleDbCommand(sqlStrings, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    sqlStrings = ""
                    sqlStrings = "UPDATE  [Acct] SET " & _
                      "[mBalance] = [mBalance] + " & amt & ""


                    comUserSelectS = New OleDbCommand(sqlStrings, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()
                    'Call requery()
                    Me.TextBox1.Text = ""
                    Me.TextBox2.Text = ""
                    Me.TextBox3.Text = ""
                    RadioButton2.Checked = False
                    RadioButton1.Checked = False
                    Me.dtgvResult.Rows.Clear()
                    Exit Sub
                End If
            End If



            If TextBox16.Text <> "" And CheckBox1.Checked <> False And TextBox16.Enabled = False And codes <> "" Then

                Choices = MsgBox("Are you sure you want to Delete?", vbYesNo + vbInformation, "Delete")

                If Choices = vbYes Then
                    Call conns()
                    str_sql_user_select = "Delete from [Salary] where vEmpid='" & TextBox16.Text & "' and id=" & codes & ""

                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()
                    MsgBox("Data has been Deleted", MsgBoxStyle.DefaultButton1, "Delete")

                End If
            End If
            myAccessReader.Close()
            strconss.Close()
            Call checkme()
            Me.TextBox1.Text = ""
            Me.TextBox2.Text = ""
            Me.TextBox3.Text = ""
            RadioButton2.Checked = False
            RadioButton1.Checked = False

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try

    End Sub

    Private Sub btnReset_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnReset.Click
        If butEdit.Visible = False Then
            butEdit.Visible = True
            butDelete.Visible = True
            TextBox16.Enabled = False
            Exit Sub
        End If

        If butEdit.Visible = True Then
            butEdit.Visible = False
            butDelete.Visible = False
            TextBox16.Enabled = True
            Exit Sub
        End If

    End Sub

    Private Sub PrintDocument1_PrintPage(ByVal sender As System.Object, ByVal e As System.Drawing.Printing.PrintPageEventArgs)

    End Sub

    Private Sub frmSalary_Cancel_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Me.Left = 0
        Me.Top = 100
        Me.Width = 796
        Me.Height = 530
        Me.MdiParent = mdiChurch

        CheckBox1.Enabled = False
        ComboBox4.Enabled = False
        ComboBox5.Enabled = False
        butEdit.Visible = False
        butDelete.Visible = False
        TextBox16.Text = ""
        ComboBox4.Text = ""
        ComboBox5.Text = ""
        TextBox1.Text = ""
        TextBox1.Text = ""
        TextBox1.Text = ""
        dtgvResult.Rows.Clear()
    End Sub

    Private Sub Label18_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Label18.Click

    End Sub
End Class